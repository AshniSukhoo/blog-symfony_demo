<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Post;
use AppBundle\Form\PostFormType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PostAdminController
 * @package AppBundle\Controller\Admin
 *
 * @Route("/admin")
 */
class PostAdminController extends Controller
{

    /**
     * @Route("/posts", name="admin_post_list")
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        return $this->render('admin/post/list.html.twig', array(
            'posts' => $posts
        ));
    }

    /**
     *
     * @Route("/post/new", name="admin_new_post")
     */
    public function createNewPostAction(Request $request)
    {
        $post = new Post();

        //create form obj
        $form = $this->createForm( PostFormType::class,$post);

        //handles data on POST
        $form->handleRequest($request);

        //if this is a POST request and if the form passed all validation
        if ($form->isSubmitted() && $form->isValid()) {


            //get from data
            /** @var Post $post */
            $post =  $form->getData();

            /** @var UploadedFile $file */
            $file = $post->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $post->setImage($fileName);

            // ... persist the $product variable or any other work

            //called doc manager
            $em = $this->getDoctrine()->getManager();

            //persist to call on obj
            $em->persist($post);
            $em->flush();

            //add success msg
            $this->addFlash('success', 'Post created');

            //redirect
            return $this->redirectToRoute('admin_post_list');
        }

        return $this->render('admin/post/create_new_form.html.twig',[
            'postForm' =>$form->createView()
        ]);
    }

    /**
     * @Route("/post/{slug}/edit", name="admin_edit_post")
     */
    public function editPostAction(Request $request, Post $post)
    {

        //create new form with post obj
        $form = $this->createForm(PostFormType::class, $post);

        //handles data on POST
        $form->handleRequest($request);

        //if this is a POST request and if the form passed all validation
        if($form->isSubmitted() && $form->isValid()){
            //retrieve data from form
            $post = $form->getData();

            //called entity manager
            $em = $this->getDoctrine()->getManager();

            //perform action
            $em->persist($post);
            $em->flush();

            //add msg
            $this->addFlash('success', 'Post edited successfully');

            //redirect
            return $this->redirectToRoute('admin_post_list');
        }

        //rendering twig
        return $this->render( 'admin/post/edit.html.twig',[
            'postForm' => $form->createView()
        ]);
    }
}