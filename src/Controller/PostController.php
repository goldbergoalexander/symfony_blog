<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function post(Request $request)
	{
		// you can fetch the EntityManager via $this->getDoctrine()
       
        $post = new Post();
        $post->setName('The post');
        $post->setDate(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));
        $post->setAutor('Alexandergoldberg');
		$post->setDates(20190409);
		$post->setData('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel lacus efficitur, auctor justo vitae, malesuada orci.');
		$post->setDates1(\DateTime::createFromFormat('Y-m-d', "2019-04-09"));
		
		$form = $this->createFormBuilder($post)
            ->add('name', TextType::class)
			->add('autor', TextType::class)
			->add('data', TextType::class,[
                'attr' => ['rows' => 20],
                'help' => 'help.post_content',
                'label' => 'label.content',
            ])
            ->add('data_summary', null,
                [
                    'attr' => ['rows' => 20],

                ]
            )
			->add('date', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Post'])
            ->getForm();
		
		 return $this->render('post/index.html.twig', [
            'form' => $form->createView(),
        ]);
		
/**
*@Route("/post", name="post_add")
*/	

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
	

	$post1=array_reverse($post);
     return $this->render('post/index.html.twig', array('post'=>$post1));
		
				
        
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
        ->findOneValue($id);

    if (!$post) {
        throw $this->createNotFoundException(
            'No post found for id '.$id
        );
    }

/*    return new Response('Post name: '.$post->getName()."<br>"."Author : ".$post->getAutor()."<br>"."Summary : ".$post->getDataSummary()."<br>"."data : ".$post->getData()."<br>"."date : ".$post->getDates() );*/
    return $this->render('post/post_show.html.twig', array('posts'=>$post[0]));
    
	 

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

    $post->setData('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere sem vitae massa mattis, et commodo elit convallis. In consequat euismod nibh aliquam finibus. Nulla tincidunt blandit molestie. Ut lobortis pharetra aliquam. Donec eget convallis enim, a ultricies nisl. Nulla facilisi. Nunc ultrices dui eu tincidunt gravida. Integer interdum metus in justo scelerisque, quis efficitur tellus vestibulum. Etiam eget nulla non felis rhoncus aliquam. Morbi blandit congue tellus. Duis lacinia, erat id pretium fermentum, libero enim vulputate lorem, nec venenatis leo tellus ut dolor. Phasellus vitae tempor libero. Aliquam fringilla eleifend fringilla.

Vivamus condimentum ante sapien, sit amet suscipit turpis euismod at. Nam tempor dignissim aliquam. Ut et bibendum augue, quis lacinia enim. Praesent aliquet non elit id facilisis. Vivamus vel lobortis urna. Aenean vestibulum lorem sed enim vehicula, eget maximus metus gravida. Donec efficitur feugiat facilisis. Nam luctus lectus nullam.');
    $entityManager->flush();

    return $this->redirectToRoute('post_show', [
        'id' => $post->getId()
    ]);
}

}

