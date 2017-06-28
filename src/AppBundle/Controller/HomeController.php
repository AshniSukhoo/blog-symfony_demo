<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\SearchForm;
use AppBundle\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * Home page
     *
     * @Route("/home", name="home_page")
     *
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(SearchForm::class);

        $em    = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findByNewestPosts();

        //create pagination
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('home/list.html.twig',
            array(
                'pagination' => $pagination,
                'searchForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/home/post/{slug}", name="show_post_details")
     */
    public function showAction(Post $post)
    {
        $em = $this->getDoctrine()->getManager();


        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();


        return $this->render('home/show_post.html.twig', [
            'post' => $post
        ]);

    }

    /**
     * list categories
     *
     * @Route("/home/category/list", name="show_category_list")
     */
    public function listCategoryAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')
            ->findAll();

        return $this->render('home/category/show_categories.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * search for post
     * @Route("/home/post/search/{slug}", name="search_post")
     */
    public function searchPost(Post $post, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post');
    }
}
