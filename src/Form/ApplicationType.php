<?php
/**
 * Created by PhpStorm.
 * User: sebastien.jacquet
 * Date: 16/01/2019
 * Time: 16:30
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType {

    /**
     *
     * Permet d'avoir la configuration d'un champ
     *
     * @param string $label
     * @param string $placeHolder
     * @param array options
     * @return array
     */
    protected function getConfiguration($label, $placeHolder, $options = []){

        return array_merge([
            'label'=> $label,
            'attr' => [
                'placeholder' => $placeHolder
            ]
        ], $options);
    }


}