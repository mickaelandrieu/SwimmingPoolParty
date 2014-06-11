<?php
namespace Sw\Bundle\SoapCommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment entity, stored as an XML file
 * This is bullshit, I know.
 */
class Comment
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $author
     */
    private $author;

    /**
     * @var int $swimmingPoolId
     */
    private $swimmingPoolId;

    /**
     * @var int $rank
     */
    private $rank;

    /**
     * @var text $content
     */
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
