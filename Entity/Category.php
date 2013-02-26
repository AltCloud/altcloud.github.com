<?php

namespace AltCloud\Instance3BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3BlogBundle\Entity\Category
 */
class Category
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
     * @var AltCloud\Instance3BlogBundle\Entity\Post
     */
    private $post;

    public function __construct()
    {
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add post
     *
     * @param AltCloud\Instance3BlogBundle\Entity\Post $post
     */
    public function addPost(\AltCloud\Instance3BlogBundle\Entity\Post $post)
    {
        $this->post[] = $post;
    }

    /**
     * Get post
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->post;
    }
    /**
     * @var AltCloud\Instance3BlogBundle\Entity\Post
     */
    private $posts;


    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Remove posts
     *
     * @param \AltCloud\Instance3BlogBundle\Entity\Post $posts
     */
    public function removePost(\AltCloud\Instance3BlogBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }
}