<?php

namespace App\Form;

use App\Entity\Params;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParamsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageaccueil',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('logo',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('apropos',TextareaType::class)

            ->add('adresse')
            ->add('telephone')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Params::class,
        ]);
    }
}
