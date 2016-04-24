<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('site/default/index.html.twig');
    }

    public function menuAction(){
        return $this->render(':site/elements:menu.html.twig');
    }

    public function footerAction(){
        return $this->render('site/elements/footer.html.twig');
    }
}
