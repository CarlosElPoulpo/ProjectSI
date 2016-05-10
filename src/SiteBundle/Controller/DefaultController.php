<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\TeamMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('site/default/index.html.twig');
    }

    /**
     * @Route("team", name="team")
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
     * @Route("contact", name="contact")
     */
    public function contactAction(){
        return $this->render('site/default/contact.html.twig');
    }

    /**
     * @Route("partners", name="partners")
     */
    public function partnersAction(){
        return $this->render('site/default/partners.html.twig');
    }

    /**
     * @Route("FAQ", name="faq")
     */
    public function FAQAction(){
        return $this->render('site/default/faq.html.twig');
    }

    /**
     * @Route("terms-of-service", name="terms_of_service")
     */
    public function termsofserviceAction(){
        return $this->render('site/default/termsofservice.html.twig');
    }

    /**
     * @Route("security", name="security")
     */
    public function securityAction(){
        return $this->render('site/default/security.html.twig');
    }

    /**
     * @Route("policies", name="policies")
     */
    public function policiesAction(){
        return $this->render('site/default/policies.html.twig');
    }

    /**
     * @Route("privacy", name="privacy")
     */
    public function privacyAction(){
        return $this->render('site/default/privacy.html.twig');
    }

    /**
     * @Route ("offers", name="offers")
     */
    public function offersAction(){
        return $this->render('site/default/offers.html.twig');
    }

    /**
     * @Route ("support", name="support")
     */
    public function supportAction(){
        return $this->render('site/default/support.html.twig');
    }

    /**
     * @Route ("get_started", name="get_started")
     */
    public function getStartedAction(){
        return $this->render('site/default/get_started.html.twig');
    }

    /**
     * @Route ("project", name="project")
     */
    public function projectdAction(){
        return $this->render('site/default/project.html.twig');
    }
    /**
     * @Route ("company", name="company")
     */
    public function companydAction(){
        return $this->render('site/default/company.html.twig');
    }

    /**
     * @Route ("architecture_network", name="architecture_network")
     */
    public function architectureAction(){
        return $this->render('site/default/architecture_network.html.twig');
    }

    /**
     * @Route ("operation", name="operation")
     */
    public function operationAction(){
        return $this->render('site/default/operation.html.twig');
    }

    /**
     * @Route ("jobs", name="jobs")
     */
    public function jobsAction(){
        return $this->render('site/default/jobs.html.twig');
    }

    /**
     * @Route ("events", name="events")
     */
    public function eventsAction(){
        return $this->render('site/default/events.html.twig');
    }

    /**
     * @Route ("customers", name="customers")
     */
    public function customersAction(){
        return $this->render('site/default/customers.html.twig');
    }

    public function menuAction(){
        return $this->render(':site/elements:menu.html.twig');
    }

    public function footerAction(){
        return $this->render('site/elements/footer.html.twig');
    }
}
