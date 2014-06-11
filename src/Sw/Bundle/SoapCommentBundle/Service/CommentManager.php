<?php

namespace Sw\Bundle\SoapCommentBundle\Service;

use Sw\Bundle\SoapCommentBundle\Entity\Comment;

class CommentManager
{
    private $xml;

    public function __construct($rootDir)
    {
        $doc = new \DOMDocument();
        $doc->load($rootDir. 'data/comments.xml');
        $this->xml = $doc;
    }

    public function addComment($swimmingPoolId, $author, $content, $rank)
    {
        return false;
    }

    public function getComments($swimmingPoolId)
    {
        $collection = array();

        $xpath = new \DOMXPath($this->xml);
        $query = "//comment[@swimmingPoolId='$swimmingPoolId']/";

        $comments = $xpath->query($query);

        foreach ($comments as $comment) {
            $item = new Comment();
            $item->setAuthor($comment->author->nodeValue)
                ->setRank($comment->rank->nodeValue)
                ->setContent($comment->content->nodeValue)
                ->setSwimmingPoolId($comment->swimmingPoolId->nodeValue)
            ;
            $collection[] = $item;
        }

        return $collection;
    }
}
