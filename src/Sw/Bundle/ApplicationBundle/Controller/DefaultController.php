<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwApplicationBundle:Default:index.html.twig', array('name' => $name));
    }
}
