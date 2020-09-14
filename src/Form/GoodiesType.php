<?php

namespace App\Form;

use App\Entity\Goodies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class GoodiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photoFile', FileType::class,array('data_class' => null,['required' => false]))
            ->add('description')
            ->add('prix')
            ->add('title')
            ->add('update_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Goodies::class,
        ]);
    }
}
