<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Guzzle\Http\Client;
use Sw\Bundle\ApplicationBundle\Entity\SwimmingPool;

class RestClientController extends Controller
{
    public function getEntryPoint()
    {
        return $this->container->getParameter('rest_entry_point');
    }

    /**
     *
     * @return JsonResponse The Swimmingpool
     */
    public function getSwimmingPoolsAction()
    {
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');

        $client = new Client($this->getEntryPoint());
        $request = $client->get('pools.json');
        $swimmingpools = $request->send();
        $swimmingpools = $swimmingpools->json();

        return $response->setData($swimmingpools);
    }

    /**
     *
     * @param id The Swimmingpool identifier
     * @return JsonResponse The Swimmingpool
     */
    public function getSwimmingPoolAction($id)
    {
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');

        $client = new Client($this->getEntryPoint());
        $request = $client->get('pools/' . intval($id) . '.json');
        $swimmingpools = $request->send();
        $swimmingpools = $swimmingpools->json();

        return $response->setData($swimmingpools);
    }

    /**
     *
     * @param id The Swimmingpool identifier
     * @return JsonResponse The Swimmingpool
     */
    public function getSwimmingPoolZipcodeAction($zipcode)
    {
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');

        $client = new Client($this->getEntryPoint());
        $request = $client->get('pools/' . $zipcode . '/zipcode.json');
        $swimmingpools = $request->send();
        $swimmingpools = $swimmingpools->json();

        return $response->setData($swimmingpools);
    }

    /**
     *
     * @param request
     */
    public function addSwimmingPoolAction(Request $request)
    {
        $swimmingPool = new SwimmingPool();
        $form = $this->createSwpForm($swimmingPool);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $form = $request->request->get('form');
            $name = $form['name'];
            $address = $form['address'];
            $zipCode = $form['zipCode'];
            $latitude = $form['lat'];
            $longitude = $form['lon'];
            $data = [
                'id'   => uniqid(),
                'name' => $name,
                'address' => $address,
                'zipCode' => $zipCode,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];

            $client = new Client($this->getEntryPoint());
            $request = $client->post('pools.json');
            $request->addPostFields($data);
            $response = $client->send($request);

            return new Response($response->getBody(), $response->getStatusCode());
        }

        return new Response('Champs manquants ou erronés', 400);
    }

    /**
     * Copy from DefaultController...
     */
    private function createSwpForm($swimmingPool)
    {
        $form = $this->createFormBuilder($swimmingPool)
            ->setAction($this->generateUrl('sw_application_swimmingpools_add'))
            ->add('name', 'text')
            ->add('address', 'text')
            ->add('zipCode', 'text')
            ->add('lat', 'text')
            ->add('lon', 'text')
            ->add('Valider', 'submit')
            ->getForm()
        ;

        return $form;
    }
}
