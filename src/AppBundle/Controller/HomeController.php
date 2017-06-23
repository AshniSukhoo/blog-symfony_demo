<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
    public function indexAction()
    {
        //call entity manager
        $em = $this->getDoctrine()->getManager();

        //get list of 10 last post vie query in repo
        $posts = $em->getRepository()->callMethodQuery();


        return new Response('hello there');

    }
}
