<?php

namespace Sw\Bundle\SwimmingRestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwSwimmingRestBundle:Default:index.html.twig', array('name' => $name));
    }
}
