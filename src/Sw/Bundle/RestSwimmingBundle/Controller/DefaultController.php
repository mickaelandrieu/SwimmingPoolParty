<?php

namespace Sw\Bundle\RestSwimmingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwRestSwimmingBundle:Default:index.html.twig', array('name' => $name));
    }
}
