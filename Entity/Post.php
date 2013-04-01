<?php

namespace AltCloud\Instance3BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3BlogBundle\Entity\Post
 */
class Post
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $teaser
     */
    private $teaser;

    /**
     * @var string $body
     */
    private $body;

    /**
     * @var datetimetz $date
     */
    private $date;

    /**
     * @var string $image
     */
    private $image;


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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set teaser
     *
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Get teaser
     *
     * @return string 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set date
     *
     * @param datetimetz $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetimetz 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @var AltCloud\Instance3BlogBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param AltCloud\Instance3BlogBundle\Entity\Category $category
     */
    public function setCategory(\AltCloud\Instance3BlogBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return AltCloud\Instance3BlogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Media
     */
    private $media;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Gallery
     */
    private $gallery;


    /**
     * Set media
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Media $media
     */
    public function setMedia(\AltCloud\Instance3MediaBundle\Entity\Media $media)
    {
        $this->media = $media;
    }

    /**
     * Get media
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set gallery
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Gallery $gallery
     */
    public function setGallery(\AltCloud\Instance3MediaBundle\Entity\Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Get gallery
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}
