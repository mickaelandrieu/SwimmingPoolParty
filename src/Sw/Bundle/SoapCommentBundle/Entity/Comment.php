<?php
namespace Sw\Bundle\SoapCommentBundle\Entity;

class Comment
{
    private $id;
    private $author;
    private $swimmingPoolId;
    private $rank;
    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function getSwimmingPoolId()
    {
        return $this->swimmingPoolId;
    }

    public function setSwimmingPoolId($swimmingPoolId)
    {
        $this->swimmingPoolId = $swimmingPoolId;

        return $this;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
