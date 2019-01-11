<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Image;
use App\Form\AnnonceType;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
     * Permet de creer une annonce
     * @Route("/ads/new", name="ads_create")
     *
     * @return response
     */
    public function create(Request $request,ObjectManager $manager){

        $ad = new Ad();

        $image = new Image();
        $image->setUrl('http://placehold.it/400x200')
              ->setCaption('Titre 1');



        $image2 = new Image();
        $image2->setUrl('http://placehold.it/400x200')
            ->setCaption('Titre 2');

        $ad->addImage($image)
            ->addImage($image2);
        
        $form = $this->createForm(AnnonceType::class, $ad);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($ad);
            $manager->flush();

            $this->addFlash(
                'success',
                "l'annonce <strong>TEST</strong> à bien été enregistrée !"
            );

            return $this->redirectToRoute('ads_show', [
                'slug' => $ad->getSlug()
            ]);
        }

        return $this->render("ad/new.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * permet d'afficher une seule annonce
     * 
     *@Route("/ads/{slug}", name="ads_show")
     * @return Response
     */
    public function show(Ad $ad){

        // je recupere une annonce qui correspond au slug
        //$ad = $repo->findOneBySlug($slug);

        return $this->render("ad/show.html.twig", [
            'ad' => $ad
        ]);
    }


}
