<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     /
    public function index1()
	{
		// you can fetch the EntityManager via $this->getDoctrine()
       
        $post = new Post();
        $post->setName('The post');
        $post->setDate(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));
        $post->setAutor('Alexandergoldberg');
		$post->setDates(20190409);
		$post->setData('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel lacus efficitur, auctor justo vitae, malesuada orci.');
		$post->setDates1(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($post);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new post with id '.$post->getId());
		
				
        
    }
	
	/**
     * @Route("/post", name="post")
     */
	 public function index()
	{
		
	 $post = $this->getDoctrine()->getRepository(Post::class)->findAllValues();
	 if (!$post) {
        throw $this->createNotFoundException(
            'No post found for id '.$id
        );
    }
	
	//return new JsonResponse($post);
    // or render a template
    // in the template, print things with {{ product.name }}
     return $this->render('post/index.html.twig', array('post'=>$post));
		
				
        
    }
	
	/**
     * @Route("/post", name="post")
     */
	
	
	
	
	
	
	/**
 * @Route("/post/{id}", name="post_show")
 */
 
	 public function show($id)
{
    $post = $this->getDoctrine()
        ->getRepository(Post::class)
        ->find($id);

    if (!$post) {
        throw $this->createNotFoundException(
            'No post found for id '.$id
        );
    }

    return new Response('Post name: '.$post->getName()."<br>"."Author : ".$post->getAutor()."<br>"."data : ".$post->getData()."<br>"."date : ".$post->getDates() );
    
	 
    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}

/**
 * @Route("/post/edit/{id}")
 */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $post = $entityManager->getRepository(Post::class)->find($id);

    if (!$post) {
        throw $this->createNotFoundException(
            'No post found for id '.$id
        );
    }

    $post->setName('New Post name!');
    $entityManager->flush();

    return $this->redirectToRoute('post_show', [
        'id' => $post->getId()
    ]);
}







	 
	/**
 * @Route("/post/{id}", name="post_show")
 */
 
 /**
 * @Route("/post/{id}", name="post_show")
 /
 
	 public function show($id)
{
    $repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->find($id);

    if (!$post) {
        throw $this->createNotFoundException(
            'No post found for id '.$id
        );
    }

    return new Response('Check out this great post: '.$post = $repository->findOne());

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}
	/**
 * @Route("/post/{id}", name="post_show")
 */
	
}
