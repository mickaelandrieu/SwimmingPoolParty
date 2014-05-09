<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwApplicationBundle:Default:index.html.twig');
    }
}
