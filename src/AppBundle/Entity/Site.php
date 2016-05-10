<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteRepository")
 */
class Site
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
     * @ORM\Column(name="explanations", type="text", nullable=true)
     */
    private $explanations;

    /**
     * @var string
     *
     * @ORM\Column(name="sources_quotation", type="text", nullable=true)
     */
    private $sourcesQuotation;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="history", type="text", nullable=true)
     */
    private $history;

    /**
     * @var string
     *
     * @ORM\Column(name="archaeological_data", type="text", nullable=true)
     */
    private $archaeologicalData;

    /**
     * @var string
     *
     * @ORM\Column(name="environmental_context", type="text", nullable=true)
     */
    private $environmentalContext;

    /**
     * @var string
     *
     * @ORM\Column(name="memorial_functions", type="text", nullable=true)
     */
    private $memorialFunctions;

    /**
     * @var string
     *
     * @ORM\Column(name="liturgical_habits", type="text", nullable=true)
     */
    private $liturgicalHabits;

    /**
     * @var string
     *
     * @ORM\Column(name="cultic_phenomena", type="text", nullable=true)
     */
    private $culticPhenomena;

    /**
     * @var bool
     *
     * @ORM\Column(name="cultic_phenomena_collection", type="boolean")
     */
    private $culticPhenomenaCollection;

    /**
     * @var string
     *
     * @ORM\Column(name="cult_objects", type="text", nullable=true)
     */
    private $cultObjects;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_data", type="text", nullable=true)
     */
    private $additionalData;


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
     * @return Site
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
     * Set explanations
     *
     * @param string $explanations
     * @return Site
     */
    public function setExplanations($explanations)
    {
        $this->explanations = $explanations;

        return $this;
    }

    /**
     * Get explanations
     *
     * @return string 
     */
    public function getExplanations()
    {
        return $this->explanations;
    }

    /**
     * Set sourcesQuotation
     *
     * @param string $sourcesQuotation
     * @return Site
     */
    public function setSourcesQuotation($sourcesQuotation)
    {
        $this->sourcesQuotation = $sourcesQuotation;

        return $this;
    }

    /**
     * Get sourcesQuotation
     *
     * @return string 
     */
    public function getSourcesQuotation()
    {
        return $this->sourcesQuotation;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Site
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Site
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set history
     *
     * @param string $history
     * @return Site
     */
    public function setHistory($history)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Get history
     *
     * @return string 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Set archaeologicalData
     *
     * @param string $archaeologicalData
     * @return Site
     */
    public function setArchaeologicalData($archaeologicalData)
    {
        $this->archaeologicalData = $archaeologicalData;

        return $this;
    }

    /**
     * Get archaeologicalData
     *
     * @return string 
     */
    public function getArchaeologicalData()
    {
        return $this->archaeologicalData;
    }

    /**
     * Set environmentalContext
     *
     * @param string $environmentalContext
     * @return Site
     */
    public function setEnvironmentalContext($environmentalContext)
    {
        $this->environmentalContext = $environmentalContext;

        return $this;
    }

    /**
     * Get environmentalContext
     *
     * @return string 
     */
    public function getEnvironmentalContext()
    {
        return $this->environmentalContext;
    }

    /**
     * Set memorialFunctions
     *
     * @param string $memorialFunctions
     * @return Site
     */
    public function setMemorialFunctions($memorialFunctions)
    {
        $this->memorialFunctions = $memorialFunctions;

        return $this;
    }

    /**
     * Get memorialFunctions
     *
     * @return string 
     */
    public function getMemorialFunctions()
    {
        return $this->memorialFunctions;
    }

    /**
     * Set liturgicalHabits
     *
     * @param string $liturgicalHabits
     * @return Site
     */
    public function setLiturgicalHabits($liturgicalHabits)
    {
        $this->liturgicalHabits = $liturgicalHabits;

        return $this;
    }

    /**
     * Get liturgicalHabits
     *
     * @return string 
     */
    public function getLiturgicalHabits()
    {
        return $this->liturgicalHabits;
    }

    /**
     * Set culticPhenomena
     *
     * @param string $culticPhenomena
     * @return Site
     */
    public function setCulticPhenomena($culticPhenomena)
    {
        $this->culticPhenomena = $culticPhenomena;

        return $this;
    }

    /**
     * Get culticPhenomena
     *
     * @return string 
     */
    public function getCulticPhenomena()
    {
        return $this->culticPhenomena;
    }

    /**
     * Set culticPhenomenaCollection
     *
     * @param boolean $culticPhenomenaCollection
     * @return Site
     */
    public function setCulticPhenomenaCollection($culticPhenomenaCollection)
    {
        $this->culticPhenomenaCollection = $culticPhenomenaCollection;

        return $this;
    }

    /**
     * Get culticPhenomenaCollection
     *
     * @return boolean 
     */
    public function getCulticPhenomenaCollection()
    {
        return $this->culticPhenomenaCollection;
    }

    /**
     * Set cultObjects
     *
     * @param string $cultObjects
     * @return Site
     */
    public function setCultObjects($cultObjects)
    {
        $this->cultObjects = $cultObjects;

        return $this;
    }

    /**
     * Get cultObjects
     *
     * @return string 
     */
    public function getCultObjects()
    {
        return $this->cultObjects;
    }

    /**
     * Set additionalData
     *
     * @param string $additionalData
     * @return Site
     */
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;

        return $this;
    }

    /**
     * Get additionalData
     *
     * @return string 
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }
}
