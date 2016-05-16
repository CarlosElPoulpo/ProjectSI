<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bill;
use AppBundle\Entity\Job;
use AppBundle\Entity\Paypal;
use AppBundle\Entity\Video;
use AppBundle\Form\JobType;
use AppBundle\Form\VideoType;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe\DataMapping\Format;
use FFMpeg\Format\Audio\Mp3;
use FFMpeg\Format\Audio\Wav;
use FFMpeg\Media\Audio;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class JobController extends Controller
{
    /**
     * @Route("/job/submit", name="job_submit")
     */
    public function submitAction(Request $request)
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job);
        if ($form->handleRequest($request)->isValid()) {
            $user = $this->getUser();
            $job->setUser($user);
            $job->setFinish(false);
            $job->getVideo()->setDuration(0);
            $this->persistJob($job);

            $request->getSession()->getFlashBag()->add('notice', 'Job soumis.');

            #return $this->redirectToRoute('overview');
            return $this->redirect($this->generateUrl('job_payment', array('id' => $job->getId())));
        }
        return $this->render('app/job/submit.html.twig', array('form'=> $form->createView()));
    }

    public function persistJob(Job $job){
        $em = $this->getDoctrine()->getManager();
        $em->persist($job->getVideo());
        $em->flush();
        $ffmprobe = $this->get('dubture_ffmpeg.ffprobe');
        $videoduration = $ffmprobe->format($job->localUrl())->get('duration');
        $hourduration = round(0.000277778 * $videoduration, 2);
        if ($hourduration < 0.01){
            $hourduration = 0.01;
        }
        $job->getVideo()->setDuration($hourduration);
        $em->persist($job);
        $em->flush();
    }
    
    /**
     * @Route("/jobs/historic", name="job_list")
     */
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Job::class);
        $jobs = $repository->findBy(array("user"=> $this->getUser()));
        return $this->render('app/job/list.html.twig', array('jobs'=> $jobs));
    }

    /**
     * @Route("/jobs/details/{id}", name="job_details")
     */
    public function detailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Job::class);
        $job = $repository->find($id);
        return $this->render('app/job/details.html.twig', array('job'=> $job));
    }

    /**
     * @Route("/jobs/payment/{id}", name="job_payment")
     */
    public function paymentAction($id)
    {
        if($this->getUser()->getSubscription()->getName() == "standard"){
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository(Job::class);
            $job = $repository->find($id);

            $paymentvalid = "http://127.0.0.1/edsa-Transcode/web/app_dev.php/app/jobs/details/".(string)$job->getId();
            $paymentfail = "http://127.0.0.1/edsa-Transcode/web/app_dev.php/app/jobs/payment-fail/".(string)$job->getId();
            $paypal = new Paypal($job->getBill()->getAmount(),
                0,
                0,
                $paymentvalid,
                $paymentfail,
                "maxime@hotmail.fr",
                $job->getName(),
                "FR",
                "EUR",
                "idUser");

            return $this->render('app/job/payment.html.twig', array('job'=> $job, 'paypalsetting'=> $paypal));
        }else{
            return $this->redirect($this->generateUrl('job_details', array('id' => $id)));
        }
    }

    /**
     * @Route("/jobs/payment-fail/{id}", name="job_payment_fail")
     */
    public function paymentfailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Job::class);
        $job = $repository->find($id);

        $em->remove($job);
        $em->flush();

        return $this->render('app/job/paymentfail.html.twig', array('job'=> $job));
    }

    /**
     * @Route("/jobs/launch/transcoding/{id}", name="job_launch_transcoding")
     */
    public function transcodingAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Job::class);
        $job = $repository->find($id);

        $ffmpeg = $this->get('dubture_ffmpeg.ffmpeg');
        $video = $ffmpeg->open($job->localUrl());
        $format = new Mp3();
        if ($job->getTargetformat() == "wav"){
            $format = new Wav();
        }
        $output = $job->result();

        $job->setLaunchdate(new \DateTime());
        $video->save($format, $output);
        $job->setFinishdate(new \DateTime());
        $job->setFinish(true);
        $em->persist($job);
        $em->flush();
        return $this->redirect($this->generateUrl('job_details', array('id' => $id)));
    }

    /**
     * @Route ("/jobs/paypal", name="paypal")
     */
    public function paypalAction(){
        $paypal = new Paypal(100,
            0,
            0,
            "http://127.0.0.1:8080/edsa-ProjectSI/web/app_dev.php",
            "http://127.0.0.1:8080/edsa-ProjectSI/web/app_dev.php/payementFail",
            "maxime@hotmail.fr",
            "Nom du produit",
            "FR",
            "EUR",
            "idUser");

        return $this->render('site/default/paypal.html.twig', ['paypal'=>$paypal]);
    }
}
