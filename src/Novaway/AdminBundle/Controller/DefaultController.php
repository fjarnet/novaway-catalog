<?php

namespace Novaway\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/admin")
 */
class DefaultController extends Controller
{
    /**
     * @Template()
     * @Route("/")
     */
    public function indexAction()
    {
        return [];
    }
}
