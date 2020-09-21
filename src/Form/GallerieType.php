<?php

namespace App\Form;

use App\Entity\Gallerie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GallerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('img1',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img2',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img3',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img4',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img5',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img6',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img7',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
            ->add('img8',FileType::class, array('label' => 'Choisir une image','data_class'=>null))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gallerie::class,
        ]);
    }
}
