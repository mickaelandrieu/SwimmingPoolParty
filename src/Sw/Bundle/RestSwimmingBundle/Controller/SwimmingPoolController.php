<?php 
namespace Sw\Bundle\RestSwimmingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;


class SwimmingPoolController extends FOSRestController
{
    /**
     * Get single Page,
     * @Annotations\View
     * 
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Page for a given id",
     *   output = "Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     * 
     *
     * @param Request $request the request object
     * @param int     $id      the page id
     *
     * @return array
     *
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function getPoolAction($id)
    {
        return $this->getOr404($id);
    }

    /**
     * Fetch the Page or throw a 404 exception.
     *
     * @param mixed $id
     *
     * @return PageInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($page = $this->container->get('sw_swimming_rest.swimming_pool.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $page;
    }

    /**
     * Create a new Page.
     *
     * @param array $parameters
     *
     * @return PageInterface
     */
    public function post(array $parameters)
    {
        $page = $this->createPage(); // factory method create an empty Page

        // Process form does all the magic, validate and hydrate the Page Object.
        return $this->processForm($page, $parameters, 'POST');
    }
}















