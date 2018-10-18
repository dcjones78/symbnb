<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController{

    /**
     * @Route("/", name="homepage")
    */
    public function homme(){

        return new Response("<html>
                                <head>
                                    <title>Mon application</title>
                                </head>
                                <body>
                                    <h1>Bonjour a tous</h1>
                                </body>
                            </html>");
    }
}
?>