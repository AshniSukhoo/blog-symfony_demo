<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Category;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $title;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $content;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $excerpt;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $tag;


    /**
     * @ORM\Column(type="boolean")
     */
    private $status= true;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;


    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


//    /**
//     * Many Posts have Many categories.
//     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", mappedBy="post")
//     * @ORM\Column(nullable=true)
//     * @ORM\JoinTable(name="post_category")
//     */
//    private $category;

//    public function __construct()
//    {
//        $this->category = new ArrayCollection();
//    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @param mixed $excerpt
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

//    /**
//     * @return mixed
//     */
//    public function getCategory()
//    {
//        return $this->category;
//    }
//
//    /**
//     * @param mixed $category
//     */
//    public function setCategory(Category $category)
//   {
//       $this->category = $category;
//   }



}