<?php

namespace Sw\Bundle\SoapCommentBundle\Controller;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sw\Bundle\SoapCommentBundle\Entity\Comment;

class DefaultController extends Controller
{
    /**
     * @Soap\Method("addComment")
     * @Soap\Param("swimmingPoolId", phpType = "int")
     * @Soap\Param("author", phpType = "string")
     * @Soap\Param("content", phpType = "string")
     * @Soap\Param("rank", phpType = "int")
     * @Soap\Result(phpType = "boolean")
     */
    public function addComment($swimmingPoolId, $author, $content, $rank)
    {
        return $this->get('sw_soap_comment.manager')->addComment($swimmingPoolId, $author, $content, $rank);
    }

    /**
     * @Soap\Method("getComments")
     * @Soap\Param("swimmingPoolId", phpType = "int")
     * @Soap\Result(phpType = "Sw\Bundle\SoapCommentBundle\Type\Comment[]")
     */
    public function getComments($swimmingPoolId)
    {
        $comments = $this->get('sw_soap_comment.manager')->getComments($swimmingPoolId);

        return $this->container->get('besimple.soap.response')->setReturnValue($comments);
    }
}
