<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class DefaultController extends AbstractController
{
/**
* @Route("/lucky/number")
*/

    public function index()
    {
        $index = random_int(0, 100);

       return $this->render('index/index.html.twig', [
            'index' => $index,
        ]);
    }
}
?>