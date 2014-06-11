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

        return $response->setData(array('swimmingpools' => $swimmingpools));
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
