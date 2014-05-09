<?php
namespace Sw\Bundle\SoapCommentBundle\Entity;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

class Comment
{
    /**
     * @Soap\ComplexType("int")
     */
    private $id;

    /**
     * @Soap\ComplexType("string")
     */
    private $author;

    /**
     * @Soap\ComplexType("int", nillable=true)
     */
    private $swimmingPoolId;

    /**
     * @Soap\ComplexType("int", nillable=true)
     */
    private $rank;

    /**
     * @Soap\ComplexType("string", nillable=true)
     */
    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
