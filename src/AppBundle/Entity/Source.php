<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Source
 *
 * @ORM\Table(name="source")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SourceRepository")
 */
class Source
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

    /**
     * @var string
     *
     * @ORM\Column(name="traveler", type="string", length=500, nullable=true)
     */
    private $traveler;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255, nullable=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="editions", type="text", nullable=true)
     */
    private $editions;

    /**
     * @var string
     *
     * @ORM\Column(name="itinerary", type="text", nullable=true)
     */
    private $itinerary;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity="Literature")
     * @ORM\JoinTable(name="sources_literatures",
     *      joinColumns={@ORM\JoinColumn(name="source_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="literature_id", referencedColumnName="id")}
     *      )
     */
    private $literatures;


    public function __construct()
    {
        $this->literatures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
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
     * @return Source
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

    /**
     * Set traveler
     *
     * @param string $traveler
     * @return Source
     */
    public function setTraveler($traveler)
    {
        $this->traveler = $traveler;

        return $this;
    }

    /**
     * Get traveler
     *
     * @return string
     */
    public function getTraveler()
    {
        return $this->traveler;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Source
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set editions
     *
     * @param string $editions
     * @return Source
     */
    public function setEditions($editions)
    {
        $this->editions = $editions;

        return $this;
    }

    /**
     * Get editions
     *
     * @return string
     */
    public function getEditions()
    {
        return $this->editions;
    }

    /**
     * Set itinerary
     *
     * @param string $itinerary
     * @return Source
     */
    public function setItinerary($itinerary)
    {
        $this->itinerary = $itinerary;

        return $this;
    }

    /**
     * Get itinerary
     *
     * @return string
     */
    public function getItinerary()
    {
        return $this->itinerary;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Source
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add literatures
     *
     * @param \AppBundle\Entity\Literature $literatures
     * @return Source
     */
    public function addLiterature(\AppBundle\Entity\Literature $literatures)
    {
        $this->literatures[] = $literatures;

        return $this;
    }

    /**
     * Remove literatures
     *
     * @param \AppBundle\Entity\Literature $literatures
     */
    public function removeLiterature(\AppBundle\Entity\Literature $literatures)
    {
        $this->literatures->removeElement($literatures);
    }

    /**
     * Get literatures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiteratures()
    {
        return $this->literatures;
    }
}
