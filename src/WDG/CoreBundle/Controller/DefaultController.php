<?php

namespace WDG\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WDGCoreBundle:Default:index.html.twig');
    }

    public function tokenAction()
    {
        return $this->render('WDGCoreBundle:Default:token.html.twig');
    }
}
