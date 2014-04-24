<?php

namespace Sw\Bundle\SoapCommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwSoapCommentBundle:Default:index.html.twig', array('name' => $name));
    }
}
