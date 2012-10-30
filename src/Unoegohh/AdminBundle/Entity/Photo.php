<?php
namespace Unoegohh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Photo
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
    protected $url;

    /**
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;


    /**
     * @ORM\ManyToOne(targetEntity="Estate")
     * @ORM\JoinColumn(name="estate_id",referencedColumnName="id")
     */
    protected $estate;


    public function __toString()
    {
        return $this->getTitle();
    }

    public function __construct()
    {
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
     * @return Photo
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
     * Set url
     *
     * @param string $url
     * @return Photo
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Photo
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Photo
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEstate($estate)
    {
        $this->estate = $estate;
    }

    public function getEstate()
    {
        return $this->estate;
    }

}