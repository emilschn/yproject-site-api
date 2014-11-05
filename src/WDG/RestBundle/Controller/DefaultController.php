<?php

namespace WDG\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WDGRestBundle:Default:index.html.twig');
    }

    public function tokenAction()
    {
        return $this->render('WDGRestBundle:Default:token.html.twig');
    }
}
