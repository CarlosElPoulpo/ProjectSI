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
     * @Route("/submitjob", name="submitjob")
     */
    public function submitAction(Request $request)
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job);
        if ($form->handleRequest($request)->isValid()) {
            $user = $this->getUser();
            $job->setName($job->generateName());
            $job->setUser($user);
            $job->setFinish(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Job soumis.');

            #return $this->redirectToRoute('overview');
            #return $this->redirect($this->generateUrl('', array('id' => $job->getId())));
        }
        return $this->render('app/default/newjob.html.twig', array('form'=> $form->createView()));
    }


}
