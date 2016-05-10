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

    /**
     * @Route("/team", name="teampage")
     */
    public function teamAction(){
        $emma = new TeamMember(
            "Emma",
            "Piconnet",
            "Administratrice réseau",
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores beatae consectetur dolorem eum exercitationem nobis possimus sequi sit voluptatem? Aperiam beatae perspiciatis quam temporibus veritatis? Autem dolore iure sapiente.",
            "Emma_Piconnet.jpg");
        $nathan = new TeamMember(
            "Nathan",
            "De Pachtere",
            "Développeur",
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores beatae consectetur dolorem eum exercitationem nobis possimus sequi sit voluptatem? Aperiam beatae perspiciatis quam temporibus veritatis? Autem dolore iure sapiente.",
            "Nathan_De_Pachtere.jpg");
        $laurene = new TeamMember(
            "Laurène",
            "Chanteloup",
            "Administratrice réseau",
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores beatae consectetur dolorem eum exercitationem nobis possimus sequi sit voluptatem? Aperiam beatae perspiciatis quam temporibus veritatis? Autem dolore iure sapiente.",
            "Laurene_Chanteloup.jpg"
        );
        $maxime = new TeamMember(
            "Maxime",
            "Lovichi",
            "Développeur",
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores beatae consectetur dolorem eum exercitationem nobis possimus sequi sit voluptatem? Aperiam beatae perspiciatis quam temporibus veritatis? Autem dolore iure sapiente.",
            "Maxime_Lovichi.jpg"
        );
        $teammembers = array($emma, $nathan, $laurene, $maxime);
        return $this->render('site/default/team.html.twig', ['teammembers'=>$teammembers]);
    }

    /**
     * @Route ("offer", name="offer")
     */
    public function priceAction(){
        return $this->render('site/offer/offer.html.twig');
    }



    
    public function menuAction(){
        return $this->render(':site/elements:menu.html.twig');
    }

    public function footerAction(){
        return $this->render('site/elements/footer.html.twig');
    }
}
