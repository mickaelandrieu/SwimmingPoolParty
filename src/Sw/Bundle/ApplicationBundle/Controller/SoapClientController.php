<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BeSimple\SoapClient\SoapClient;

class SoapClientController extends Controller
{
    public function getCommentsAction(Request $request)
    {
        $url = "http://localhost/SwimmingPoolParty/web/app_dev.php/ws/CommentApi";
        try {
                $client = new SoapClient($url, array('trace' => 1, 'soap_version' => SOAP_1_2));
                $a = array('swimmingPoolId'=>2919);
                $response = $client->__soapCall('getComments', array($a));
                var_dump($response);
                die();

            } catch (\SoapFault $e) {
                var_dump($e->getMessage(), $client->__getLastResponse()); die();
        }
        return new Response('getComments');
    }

    public function addCommentAction(Request $request)
    {
        return new Response('addComment');
    }
}
