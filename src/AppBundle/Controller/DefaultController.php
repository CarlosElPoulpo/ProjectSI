<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/overview", name="overview")
     */
    public function overviewAction(){
        return $this->render('app/default/overview.html.twig');
    }

    public function topmenuAction()
    {
        return $this->render('app/elements/topmenu.html.twig');
    }

    public function sidemenuAction()
    {
        return $this->render('app/elements/sidemenu.html.twig');
    }
}
