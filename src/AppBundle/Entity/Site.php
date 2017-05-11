<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(name="historical_names", type="text", nullable=true)
     */
    private $historicalNames;

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
     * @var string
     *
     * @ORM\Column(name="additional_data", type="text", nullable=true)
     */
    private $additionalData;

    /**
     * @ORM\ManyToMany(targetEntity="MemorialFunctionsKeyword")
     * @ORM\OrderBy({"title" = "ASC"})
     * @ORM\JoinTable(name="sites_memorialfunctionskeywords",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="memorialfunctionskeyword_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $memorialFunctionsKeywords;

    /**
     * @ORM\ManyToMany(targetEntity="HistoricalSource")
     * @ORM\JoinTable(name="sites_historicalsources",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="historicalsource_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $historicalSources;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id", nullable=true)
     */
    private $location;

    /**
     * @ORM\ManyToMany(targetEntity="CulticPhenomenaKeyword")
     * @ORM\JoinTable(name="sites_culticphenomenakeywords",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="culticphenomenakeyword_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $culticPhenomenaKeywords;

    /**
     * @ORM\ManyToMany(targetEntity="Source")
     * @ORM\OrderBy({"year" = "ASC"})
     * @ORM\JoinTable(name="sites_sources",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="source_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $sources;

    /**
     * @ORM\ManyToMany(targetEntity="Literature")
     * @ORM\OrderBy({"title" = "asc"})
     * @ORM\JoinTable(name="sites_literatures",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="literature_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $literatures;

    /**
     * @ORM\OneToMany(targetEntity="SiteImage", mappedBy="site", cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt = null;


    public function __construct() {
        $this->memorialFunctionsKeywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->historicalSources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->culticPhenomenaKeywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->literatures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set historicalNames
     *
     * @param string $historicalNames
     * @return Site
     */
    public function setHistoricalNames($historicalNames)
    {
        $this->historicalNames = $historicalNames;

        return $this;
    }

    /**
     * Get historicalNames
     *
     * @return string
     */
    public function getHistoricalNames()
    {
        return $this->historicalNames;
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

    /**
     * Add memorialFunctionsKeywords
     *
     * @param \AppBundle\Entity\MemorialFunctionsKeyword $memorialFunctionsKeywords
     * @return Site
     */
    public function addMemorialFunctionsKeyword(\AppBundle\Entity\MemorialFunctionsKeyword $memorialFunctionsKeywords)
    {
        $this->memorialFunctionsKeywords[] = $memorialFunctionsKeywords;

        return $this;
    }

    /**
     * Remove memorialFunctionsKeywords
     *
     * @param \AppBundle\Entity\MemorialFunctionsKeyword $memorialFunctionsKeywords
     */
    public function removeMemorialFunctionsKeyword(\AppBundle\Entity\MemorialFunctionsKeyword $memorialFunctionsKeywords)
    {
        $this->memorialFunctionsKeywords->removeElement($memorialFunctionsKeywords);
    }

    /**
     * Get memorialFunctionsKeywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemorialFunctionsKeywords()
    {
        return $this->memorialFunctionsKeywords;
    }

    /**
     * Add historicalSources
     *
     * @param \AppBundle\Entity\HistoricalSource $historicalSources
     * @return Site
     */
    public function addHistoricalSource(\AppBundle\Entity\HistoricalSource $historicalSources)
    {
        $this->historicalSources[] = $historicalSources;

        return $this;
    }

    /**
     * Remove historicalSources
     *
     * @param \AppBundle\Entity\HistoricalSource $historicalSources
     */
    public function removeHistoricalSource(\AppBundle\Entity\HistoricalSource $historicalSources)
    {
        $this->historicalSources->removeElement($historicalSources);
    }

    /**
     * Get historicalSources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistoricalSources()
    {
        return $this->historicalSources;
    }

    /**
     * Add culticPhenomenaKeywords
     *
     * @param \AppBundle\Entity\CulticPhenomenaKeyword $culticPhenomenaKeywords
     * @return Site
     */
    public function addCulticPhenomenaKeyword(\AppBundle\Entity\CulticPhenomenaKeyword $culticPhenomenaKeywords)
    {
        $this->culticPhenomenaKeywords[] = $culticPhenomenaKeywords;

        return $this;
    }

    /**
     * Remove culticPhenomenaKeywords
     *
     * @param \AppBundle\Entity\CulticPhenomenaKeyword $culticPhenomenaKeywords
     */
    public function removeCulticPhenomenaKeyword(\AppBundle\Entity\CulticPhenomenaKeyword $culticPhenomenaKeywords)
    {
        $this->culticPhenomenaKeywords->removeElement($culticPhenomenaKeywords);
    }

    /**
     * Get culticPhenomenaKeywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCulticPhenomenaKeywords()
    {
        return $this->culticPhenomenaKeywords;
    }

    /**
     * Add sources
     *
     * @param \AppBundle\Entity\Source $sources
     * @return Site
     */
    public function addSource(\AppBundle\Entity\Source $sources)
    {
        $this->sources[] = $sources;

        return $this;
    }

    /**
     * Remove sources
     *
     * @param \AppBundle\Entity\Source $sources
     */
    public function removeSource(\AppBundle\Entity\Source $sources)
    {
        $this->sources->removeElement($sources);
    }

    /**
     * Get sources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * Add literatures
     *
     * @param \AppBundle\Entity\Literature $literatures
     * @return Site
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

    /**
     * Add images
     *
     * @param \AppBundle\Entity\SiteImage $image
     * @return Site
     */
    public function addImage(SiteImage $image)
    {
        $this->images[] = $image;
        $image->setSite($this);
        return $this;
    }
    /**
     * Remove images
     *
     * @param \AppBundle\Entity\SiteImage $image
     */
    public function removeImage(SiteImage $image)
    {
        $this->images->removeElement($image);
        $image->setSite(null);
    }
    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Site
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set location
     *
     * @param \AppBundle\Entity\Location $location
     * @return Site
     */
    public function setLocation(\AppBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \AppBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }
}
