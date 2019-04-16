<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="app_task")
     */
   public function task(Request $request)
    {
     /*   
        $post = new Post();
        $post->setName('The post');
        $post->setDate(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));
        $post->setAutor('Alexandergoldberg');
		$post->setDates(20190409);
		$post->setData('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel lacus efficitur, auctor justo vitae, malesuada orci.');
		$post->setDates1(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));
		*/
		  $post = new Post();
		$form = $this->createFormBuilder($post)
            ->add('name', TextType::class)
			->add('date', DateType::class)
			->add('autor', TextType::class)
			->add('dates', TextType::class)
			->add('data', TextType::class)
			->add('dates1', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Post'])
            ->getForm();
		
		
		
		$form->handleRequest($request);

    if ($form->isSubmitted()) {
        $post = $form->getData();
        //$post->setName($post['name']);
		//$post->setAutor($post['autor']);
		//$post->setData($post['data']);
		//$post->setDate($post['date']);
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $entityManager = $this->getDoctrine()->getManager();
		//$post = $form->getData();
        $entityManager->persist($post);
        $entityManager->flush();

    //return new Response('Saved new product with id '.$post->getId());
	  //return $this->render('post/index.html.twig', ['post'=>$post]);
	  return $this->redirectToRoute('post');
    }

    
		 return $this->render('task/task.html.twig', [
            'form' => $form->createView(),
        ]);
		
				
    
  }
}
