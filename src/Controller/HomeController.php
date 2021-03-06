<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller {

    /**
     * Montre la page qui dit bonjour
     *
     * @Route("/bonjour/{prenom}/age/{age}", name="hello")
     * @Route("/salut", name="hello_base")
     * @Route("/bonjour/prenom", name="hello_prenom")
     */
    public function hello($prenom = "anonyme", $age = 0){

        //return new Response("Bonjour " . $prenom . " vous avez " . $age . " ans");        
        return $this->render("hello.html.twig", 
            [
                'prenom' => $prenom,
                'age' => $age
            ]
            );
    }


    /**
     * @Route("/", name="homepage")
    */

    public function home(){

        $prenoms = ["sebastien" => 31, "sabine" => 12, "luka" => 54, "noemie" => 26];

        return $this->render(
            'home.html.twig',
            [
                'title' => 'Aurevoir tous monde',
                'age'   => 12,
                'tableau' => $prenoms    
            ]

        );
    }
}
?>