<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /* 
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    */

    #[Route('/blog/{id}/{name}',  name: 'app_blog', requirements: ["name"=>"[a-zA-Z]{5,50}","id"=>"[0-9]{2,6}"])]
    public function index(int $id, string $name): Response {
        // https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Regular_Expressions#exemples
            return $this->render('blog/index.html.twig', [
                                                    'id' => $id,
                                                    'name' => $name,
                                 ]);
    }

    #[Route('/blog/hello', name: 'app_blog_hello')]
    public function hello(): Response
    {
            return new Response('Hello World'); 
    }
}
