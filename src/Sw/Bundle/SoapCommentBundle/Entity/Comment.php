<?php
namespace Sw\Bundle\SoapCommentBundle\Entity;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;


/**
 * Comment entity, stored as an XML file
 * This is bullshit, I know.
 */
class Comment
{
    /**
     * @var int $id
     * @Soap\ComplexType("int")
     */
    private $id;

    /**
     * @var string $author
     * @Soap\ComplexType("string")
     */
    private $author;

    /**
     * @var int $swimmingPoolId
     * @Soap\ComplexType("int", nillable=true)
     */
    private $swimmingPoolId;

    /**
     * @var int $rank
     * @Soap\ComplexType("int", nillable=true)
     */
    private $rank;

    /**
     * @var text $content
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
