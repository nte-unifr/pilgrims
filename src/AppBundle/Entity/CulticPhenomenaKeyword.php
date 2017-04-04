<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CulticPhenomenaKeyword
 *
 * @ORM\Table(name="cultic_phenomena_keyword")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CulticPhenomenaKeywordRepository")
 */
class CulticPhenomenaKeyword
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500)
     */
    private $title;


    public function __toString() {
        return $this->getTitle();
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CultObjectsKeyword
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
