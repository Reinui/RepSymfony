<?php
namespace App\Controller;
use Faker\Factory; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController {
    #[Route('/test/twig', name: 'app_test_twig')]
    public function index(): Response {
        // on utilise la Faker\Factory pour créer un Faker version française
        $faker = Factory::create('fr_FR'); // plus d'information ici : https://fakerphp.github.io/
        // on crée un tableau de user
        $users = [];
        /*
        for ($i = 0; $i < 9; $i++) {
            $users[$i] = $faker->name(); // on génére des noms 
        }
        */
        for ($i = 0; $i < 9; $i++) { 
            $user = [ // maintenant l'objet user est un tableau associatif
                'name' => $faker->name(),
                'email' => $faker->email(),
                'age' => $faker->randomNumber(2, false),
                'address' => [
                    'street' => $faker->streetName(),
                    'code_postal' => $faker->postcode(),
                    'city' => $faker->city(),
                    'country' => $faker->country(),
                ],
                /*
                'picture' => $faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
                'cover' =>  $faker->imageUrl(360, 360, 'animals', true, 'cats', true, 'jpg'),
                */
                // Pour les images "fictives", on utilise le site picsum.photos plutot que le faker php
                'picture' => "https://picsum.photos/360/360?image=".$i,
                'cover' => "https://picsum.photos/360/360?image=".($i+100),
                'createdAt' => $faker->dateTime()
            ];
            $users[$i] = $user;
        }

       // on appelle la vue en transférant les paramètres
        return $this->render('test/index.html.twig', [
                'title' => 'Page Accueil',
                'users' => $users,
            ]);
    }
}
