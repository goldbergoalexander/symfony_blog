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
        /*$day = new \DateTime::createFromFormat('m-d-y', 'now');*/
     	$post = new Post();
        $post->setDate(new \DateTime("now"));
        $post->setDates(20190409);
        $post->setDates1(new \DateTime('now'));
		$form = $this->createFormBuilder($post)
            ->add('name', TextType::class)
			/*->add('date', DateType::class)*/

			->add('autor', TextType::class)
			->add('data', null,
                [
                    'attr' => ['rows' => 20],

                ]
                )
            ->add('data_summary', null,
                [
                    'attr' => ['rows' => 20],

                ]
            )
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
