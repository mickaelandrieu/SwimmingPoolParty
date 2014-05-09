<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SoapClientController extends Controller
{
    const WSDL = "http://localhost/SwimmingPoolParty/web/app_dev.php/ws/CommentApi";

    public function getCommentsAction(Request $request)
    {
        try {
                $client = new \SoapClient(self::WSDL, array('trace' => 1, 'soap_version' => SOAP_1_2, 'wsdl_cache' => 0));
                $params = array('swimmingPoolId' => 2919);
                $comments = $client->__soapCall('getComments', $params);

                //echo $client->__getLastResponse();die;
                //die;
            } catch (\SoapFault $e) {
                var_dump($e->getMessage(), $client->__getLastResponse()); die;
        }
        return new Response($client->__getLastResponse());
    }

    public function addCommentAction(Request $request)
    {
        return new Response('addComment');
    }

    public function goodByeAction($name)
    {
        try {
                $client = new SoapClient(self::WSDL, array('trace' => 1, 'soap_version'=>SOAP_1_2));
                $a = array('name'=> $name);
                $response = $client->__soapCall('goodBye', $a);
            } catch (\SoapFault $e) {
                var_dump($client,$e->getMessage(), $client->__getLastResponse()); die;
        }
        return new Response($response);
    }
}
