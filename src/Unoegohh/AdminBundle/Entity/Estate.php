<?php
namespace Unoegohh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Estate
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $descr;

    /**
     * @ORM\Column(type="string")
     */
    protected $smallDesc;

    /**
     * @ORM\Column(type="string")
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="EstateCategory")
     * @ORM\JoinColumn(name="category_id",referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\Column(type="text")
     */
    protected $map;

    /**
     * @ORM\Column(type="string")
     */
    protected $video;

    /**
     * @ORM\Column(type="string")
     */
    protected $placement;

    /**
     * @ORM\Column(type="string")
     */
    protected $position;

    /**
     * @ORM\Column(type="string")
     */
    protected $square;

    /**
     * @ORM\Column(type="string")
     */
    protected $floor;

    /**
     * @ORM\Column(type="string")
     */
    protected $beds;

    /**
     * @ORM\Column(type="string")
     */
    protected $furniture;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\Column(type="string")
     */
    protected $garaj;

    /**
     * @ORM\OneToMany(targetEntity="EstatePhoto",mappedBy="estate",cascade={"persist"})
     */
    protected $photos;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $plane;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $bus;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $train;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $road;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $shop;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $ski;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $beach;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function setBeach($beach)
    {
        $this->beach = $beach;
    }

    public function getBeach()
    {
        return $this->beach;
    }

    public function setBeds($beds)
    {
        $this->beds = $beds;
    }

    public function getBeds()
    {
        return $this->beds;
    }

    public function setBus($bus)
    {
        $this->bus = $bus;
    }

    public function getBus()
    {
        return $this->bus;
    }

    public function setDescr($descr)
    {
        $this->descr = $descr;
    }

    public function getDescr()
    {
        return $this->descr;
    }

    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function setFurniture($furniture)
    {
        $this->furniture = $furniture;
    }

    public function getFurniture()
    {
        return $this->furniture;
    }

    public function setGaraj($garaj)
    {
        $this->garaj = $garaj;
    }

    public function getGaraj()
    {
        return $this->garaj;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPlacement($placement)
    {
        $this->placement = $placement;
    }

    public function getPlacement()
    {
        return $this->placement;
    }

    public function setPlane($plane)
    {
        $this->plane = $plane;
    }

    public function getPlane()
    {
        return $this->plane;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setShop($shop)
    {
        $this->shop = $shop;
    }

    public function getShop()
    {
        return $this->shop;
    }

    public function setSki($ski)
    {
        $this->ski = $ski;
    }

    public function getSki()
    {
        return $this->ski;
    }

    public function setSmallDesc($smallDesc)
    {
        $this->smallDesc = $smallDesc;
    }

    public function getSmallDesc()
    {
        return $this->smallDesc;
    }

    public function setSquare($square)
    {
        $this->square = $square;
    }

    public function getSquare()
    {
        return $this->square;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTrain($train)
    {
        $this->train = $train;
    }

    public function getTrain()
    {
        return $this->train;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setVideo($video)
    {
        $this->video = $video;
    }

    public function getVideo()
    {
        return $this->video;
    }



    /**
     * Set category
     *
     * @param string $category
     * @return Estate
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function setRoad($road)
    {
        $this->road = $road;
    }

    public function getRoad()
    {
        return $this->road;
    }

    public function addPhoto($photos)
    {
        $photos->setEstate($this);
        $this->photos[] = $photos;
    }

    public function addPhotos($photos)
    {
        $this->addPhoto($photos);
    }

    public function removePhoto($photo)
    {
        $this->photos->removeElement($photo);
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setMap($map)
    {
        $this->map = $map;
    }

    public function getMap()
    {
        return $this->map;
    }
}