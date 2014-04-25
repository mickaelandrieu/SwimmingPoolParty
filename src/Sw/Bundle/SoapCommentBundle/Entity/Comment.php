<?php
namespace Sw\Bundle\SoapCommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="swimming_comment")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var int $swimmingPoolId
     *
     * @ORM\Column(name="swimming_pool_id", type="integer")
     */
    private $swimmingPoolId;

    /**
     * @var int $rank
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

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
}
