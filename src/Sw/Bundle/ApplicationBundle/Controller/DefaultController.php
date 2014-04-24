<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwApplicationBundle:Default:index.html.twig');
    }

    /**
     * @deprecated This action should be removed when REST Service will be available
     *
     * @return JSonResponse The list of Swimming pools
     */
    public function getSwimmingPoolsAction()
    {
        $response = new JsonResponse();

        $repository = $this->getDoctrine()
            ->getRepository('SwRestSwimmingBundle:SwimmingPool')
        ;

        $swimmingpools = $repository->createQueryBuilder('s')
            ->getQuery()
            ->getArrayResult()
        ;

        $response->setData(array('swimmingpools' => $swimmingpools));
        return $response;
    }
}
