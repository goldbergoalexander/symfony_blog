<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
	{
		// you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setname('Keyboard');
        $post->setdate(\DateTime::createFromFormat('Y-m-d', "2019-04-08"));
        $post->setautor('Alexandergoldberg');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($post);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$post->getId());
		
				
        
    }
	
	/**
     * @Route get Posts 
     */
	 public function show($id)
{
    $post = $this->getDoctrine()
        ->getRepository(Post::class)
        ->find($id);

    if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    return new Response('Check out this great product: '.$post->getname());

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}
	 
	 /**
     * @Route get Posts 
     */
	
	
	
}
