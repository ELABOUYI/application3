<?php

namespace App\Form;

use App\Entity\Aliments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlimentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('imageFile', FileType::class, [
                'required'=>false,
                'data_class' => null,
                'empty_data' => ''
            ])
            ->add('calorie')
            ->add('proteine')
            ->add('glucide')
            ->add('lipide')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aliments::class,
        ]);
    }
}
