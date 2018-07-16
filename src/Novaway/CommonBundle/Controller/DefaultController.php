<?php

namespace Novaway\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/novaway")
     */
    public function indexAction()
    {
        return $this->render('NovawayCommonBundle:Default:index.html.twig');
    }
}
