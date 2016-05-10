<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use AppBundle\Entity\Video;
use AppBundle\Form\JobType;
use AppBundle\Form\VideoType;
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
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Job soumis.');

            #return $this->redirectToRoute('overview');
            #return $this->redirect($this->generateUrl('', array('id' => $job->getId())));
        }
        return $this->render('app/job/submit.html.twig', array('form'=> $form->createView()));
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
}
