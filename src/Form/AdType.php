<?php

namespace App\Form;

use App\Form\ImageType;

use App\Entity\Ad;
use App\Form\ApplicationType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add(
                'title',
                TextType::class,
                $this->getConfiguration("Titre", "Tapez un super titre pour votre annonce")
            )
            ->add(
                'slug',
                TextType::class,
                $this->getConfiguration("Adresse web", "Adresse Web ( Automatique )", [
                    'required' => false
                ])
            )
            ->add(
                'coverImage',
                UrlType::class,
                $this->getConfiguration("URL de l'image principal", "Donner l'adresse de la photo")
            )
            ->add(
                'introduction',
                TextType::class,
                $this->getConfiguration("Introduction ",
                    "Donnez une description globale de l'annonce")
            )
            ->add(
                'content',
                TextareaType::class,
                $this->getConfiguration("Description détailleé", "Taper une description qui donne envie de chez vous.")
            )
            ->add(
                'rooms',
                IntegerType::class,
                $this->getConfiguration("Nombre de chambres", "Nombre de chambres disponibles")
            )
            ->add(
                'price',
                MoneyType::class,$this->getConfiguration("Prix par nuit", "Indiquer le prix que vous voulez ppour une nuit")
            )
            ->add(
                'images',
                CollectionType::class,
                [
                    'entry_type' => ImageType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class
        ]);
    }
}
