<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
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
     * @ORM\Column(type="string")
     */
    private $title;


    /**
     * @ORM\Column(type="string")
     */
    private $content;


    /**
     * @ORM\Column(type="string")
     */
    private $excerpt;


    /**
     * @ORM\Column(type="string")
     */
    private $tag;


    /**
     * @ORM\Column(type="string")
     */
    private $status;


    //
    private $image;


    /**
     * @ORM\Column(type="string")
     */
    private $slug;


    // define relationship of product in post
    private $category;



}