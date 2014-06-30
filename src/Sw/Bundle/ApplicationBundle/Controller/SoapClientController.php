<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BeSimple\SoapClient\SoapClient;
use Sw\Bundle\ApplicationBundle\Entity\Comment;

class SoapClientController extends Controller
{
    public function getEntryPoint()
    {
        return $this->container->getParameter('sw_soap_comment.soap_entry_point');
    }

    public function getCommentsAction($swimmingPoolId)
    {
        try {
                $client = new SoapClient($this->getEntryPoint(), array('cache_wsdl' => WSDL_CACHE_NONE,
                    'trace' => true,
                    'exceptions' => true,
                    'encoding'=>'UTF-8',
                    'features' => SOAP_SINGLE_ELEMENT_ARRAYS
                    )
                );

                $params = array('swimmingPoolId' => $swimmingPoolId);
                $response = $client->__soapCall('getComments', $params);
            } catch (\SoapFault $e) {
                var_dump($e->getMessage(), $client->__getLastResponse());
        }
        return new Response($client->__getLastResponse());
    }

    public function addCommentAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createCommentForm($comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $form = $request->request->get('form');
            $swimmingPoolId = $form['swimmingPoolId'];
            $author = $form['author'];
            $content = $form['content'];
            $rank = $form['rank'];

            $params = array(
                'swimmingPoolId' => $swimmingPoolId,
                'author' => $author,
                'content' => $content,
                'rank' => $rank
            );

            try {
                    $client = new SoapClient($this->getEntryPoint(), array('cache_wsdl' => WSDL_CACHE_NONE,
                        'trace' => true,
                        'exceptions' => true,
                        'encoding'=>'UTF-8',
                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS
                        )
                    );

                    $response = $client->__soapCall('addComment', $params);
                } catch (\SoapFault $e) {
                    var_dump($e->getMessage(), $client->__getLastResponse());
            }
            return new Response($client->__getLastResponse());
        }

        return new Response('Champs manquants ou erronés', 400);

    }

    /**
     * Duplicate form DefaultController...
     */
    private function createCommentForm($comment)
    {
        $form = $this->createFormBuilder($comment)
            ->setAction($this->generateUrl('sw_application_swimmingpools_add_comment'))
            ->add('swimmingPoolId', 'hidden')
            ->add('author', 'text')
            ->add('content', 'textarea')
            ->add('rank', 'hidden', array('data' => 3))
            ->getForm()
        ;

        return $form;
    }
}
