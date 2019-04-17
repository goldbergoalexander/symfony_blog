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
        $entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($post);
        $entityManager->flush();
        return $this->redirectToRoute('post');
    }

    
		 return $this->render('task/task.html.twig', [
            'form' => $form->createView(),
        ]);
		
				
    
  }
}
