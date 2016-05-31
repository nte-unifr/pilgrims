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
     * @ORM\ManyToMany(targetEntity="MemorialFunctionsKeyword")
     * @ORM\JoinTable(name="sites_memorialfunctionskeywords",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="memorialfunctionskeyword_id", referencedColumnName="id")}
     *      )
     */
    private $memorialFunctionsKeywords;

    /**
     * @ORM\ManyToMany(targetEntity="HistoricalSource")
     * @ORM\JoinTable(name="sites_historicalsources",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="historicalsource_id", referencedColumnName="id")}
     *      )
     */
    private $historicalSources;

    /**
     * @ORM\ManyToMany(targetEntity="Toponym")
     * @ORM\JoinTable(name="sites_toponyms",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="toponym_id", referencedColumnName="id")}
     *      )
     */
    private $toponyms;

    /**
     * @ORM\ManyToMany(targetEntity="CultObjectsKeyword")
     * @ORM\JoinTable(name="sites_cultobjectskeywords",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="cultobjectskeyword_id", referencedColumnName="id")}
     *      )
     */
    private $cultObjectsKeywords;

    /**
     * @ORM\ManyToMany(targetEntity="Source")
     * @ORM\JoinTable(name="sites_sources",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="source_id", referencedColumnName="id")}
     *      )
     */
    private $sources;

    /**
     * @ORM\ManyToMany(targetEntity="Literature")
     * @ORM\JoinTable(name="sites_literatures",
     *      joinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="literature_id", referencedColumnName="id")}
     *      )
     */
    private $literatures;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="site_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt = null;


    public function __construct() {
        $this->memorialFunctionsKeywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->historicalSources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->toponyms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cultObjectsKeywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->literatures = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add toponyms
     *
     * @param \AppBundle\Entity\Toponym $toponyms
     * @return Site
     */
    public function addToponym(\AppBundle\Entity\Toponym $toponyms)
    {
        $this->toponyms[] = $toponyms;

        return $this;
    }

    /**
     * Remove toponyms
     *
     * @param \AppBundle\Entity\Toponym $toponyms
     */
    public function removeToponym(\AppBundle\Entity\Toponym $toponyms)
    {
        $this->toponyms->removeElement($toponyms);
    }

    /**
     * Get toponyms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getToponyms()
    {
        return $this->toponyms;
    }

    /**
     * Add cultObjectsKeywords
     *
     * @param \AppBundle\Entity\CultObjectsKeyword $cultObjectsKeywords
     * @return Site
     */
    public function addCultObjectsKeyword(\AppBundle\Entity\CultObjectsKeyword $cultObjectsKeywords)
    {
        $this->cultObjectsKeywords[] = $cultObjectsKeywords;

        return $this;
    }

    /**
     * Remove cultObjectsKeywords
     *
     * @param \AppBundle\Entity\CultObjectsKeyword $cultObjectsKeywords
     */
    public function removeCultObjectsKeyword(\AppBundle\Entity\CultObjectsKeyword $cultObjectsKeywords)
    {
        $this->cultObjectsKeywords->removeElement($cultObjectsKeywords);
    }

    /**
     * Get cultObjectsKeywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCultObjectsKeywords()
    {
        return $this->cultObjectsKeywords;
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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}
