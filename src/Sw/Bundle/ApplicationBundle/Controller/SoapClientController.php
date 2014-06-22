<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BeSimple\SoapClient\SoapClient;

class SoapClientController extends Controller
{
    const WSDL = "http://localhost/SwimmingPoolParty/web/app_dev.php/ws/CommentApi";

    public function getCommentsAction($swimmingPoolId)
    {
        try {
                $client = new SoapClient(self::WSDL, array('cache_wsdl' => WSDL_CACHE_NONE,
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
        return new Response('addComment');
    }
}
