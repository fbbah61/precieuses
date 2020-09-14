<?php

namespace App\Form;

use App\Entity\Stampwish;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StampwishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_expediteur')
            ->add('nom_destinataire')
            ->add('adresse_destinataire')
            ->add('theme', ChoiceType::class, [
                'choices'  => [
                    'STAMPWISH_ME_FIT' => 'STAMPWISH_ME_FIT',
                    'STAMPWISH_ME_LOVE' => 'STAMPWISH_ME_LOVE',
                    'STAMPWISH_ME_BLISS' => 'STAMPWISH_ME_BLISS',
                    'STAMPWISH_ME_FELL' => 'STAMPWISH_ME_FELL',
                    'STAMPWISH_ME_SHINE' => 'STAMPWISH_ME_SHINE',
                    'STAMPWISH_ME_WANT' => 'STAMPWISH_ME_WANT',
                    'STAMPWISH_ME_&_MYSELF' => 'STAMPWISH_ME_&_MYSELF',

                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stampwish::class,
        ]);
    }
}
