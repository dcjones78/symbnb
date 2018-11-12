<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(AdRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Ad::class);
    
        $ads = $repo->findAll();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads,
        ]);
    }

    /**
     * permet d'afficher une seule annonce
     * 
     *@Route("/ads/{slug}", name="ads_show")
     * @return Response
     */
    public function show($slug, AdRepository $repo){

        //die($slug);
        // je recupere une annonce qui correspond au slug
        $ad = $repo->findOneBySlug($slug);

        //die($ad->getTitle());

        return $this->render("ad/show.html.twig", [
            'ad' => $ad
        ]);
    }
}
