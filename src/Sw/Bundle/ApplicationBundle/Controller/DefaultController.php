<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Faker\Factory;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwApplicationBundle:Default:index.html.twig');
    }

    public function listAction()
    {
        return $this->render('SwApplicationBundle:Default:list.html.twig');
    }

    /**
     * @deprecated This action should be removed when REST Service will be available
     *
     * @return JSonResponse The list of Swimmingpools
     */
    public function getSwimmingPoolsAction()
    {
        $response = new JsonResponse();

        $swimmingpools = $this
            ->getDoctrine()
            ->getRepository('SwRestSwimmingBundle:SwimmingPool')
            ->createQueryBuilder('s')
            ->getQuery()
            ->getArrayResult()
        ;

        return $response->setData(array('swimmingpools' => $swimmingpools));
    }

    /**
     * @deprecated This action should be removed when REST Service will be available
     *
     * @param id The Swimmingpool identifier
     * @return JsonResponse The Swimmingpool
     */
    public function getSwimmingPoolAction($id)
    {
        $response = new JsonResponse();
        $swimmingpool = $this
            ->getDoctrine()
            ->getRepository('SwRestSwimmingBundle:SwimmingPool')
            ->createQueryBuilder('s')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult()
        ;

        return $response->setData(array('swimmingpool' => $swimmingpool));
    }

    /**
     * @deprecated This action should be removed when SOAP Service will be available
     *
     * @param id The Swimmingpool identifier
     * @return JsonResponse The list of comments for an identified Swimming pool
     */
    public function getCommentsAction($id)
    {
        $response = new JsonResponse();
        $comments = array();
        $faker = Factory::create();
        for($i = 0; $i < 10; $i++) {
            $comments[] = array(
                'author'  => $faker->name,
                'content' => $faker->text,
                'rank'    => $faker->numberBetween(0, 5)
            );
        }
        return $response->setData(array('comments' => $comments));
    }
}
