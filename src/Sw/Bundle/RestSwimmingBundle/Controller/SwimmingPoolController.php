<?php 
namespace Sw\Bundle\RestSwimmingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;


class SwimmingPoolController extends FOSRestController
{
    /**
     * Gets a swimming pool for a given id
     * @Annotations\View
     * 
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a swimming pool for a given id",
     *   output = "Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @return array
     * @throws NotFoundHttpException when page not exist
     */
    public function getPoolAction($id)
    {
        return $this->getOr404($id);
    }

    /**
     * Get all swimming pool
     * @Annotations\View
     * 
     * @ApiDoc(
     *   resource = true,
     *   description = "Get all swimming pool",
     *   output = "Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @return array
     * @throws NotFoundHttpException when page not exist
     */
    public function getPoolsAction()
    {
        return $this->getAllOr404();
    }

    /**
     * Create a Page from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new page from the submitted data.",
     *   input = "Acme\BlogBundle\Form\PageType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postPoolsAction(Request $request)
    {
        $pool = $request->request->all();
        $this->container->get('sw_swimming_rest.swimming_pool.handler')->post($pool);
        header('HTTP/1.0 201 Created');
        exit;
    }
    /**
     * Fetch the Page or throw a 404 exception.
     *
     * @param mixed $id
     * @return PageInterface
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($pool = $this->container->get('sw_swimming_rest.swimming_pool.handler')->get($id))) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        return $pool;
    }

    /**
     * Fetch the Page or throw a 404 exception.
     *
     * @param mixed $id
     * @return PageInterface
     * @throws NotFoundHttpException
     */
    protected function getAllOr404()
    {
        if (!($pools = $this->container->get('sw_swimming_rest.swimming_pool.handler')->getAll())) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }            
        return $pools;
    }
}