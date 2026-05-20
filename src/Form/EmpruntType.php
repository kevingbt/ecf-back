<?php

namespace App\Form;

use App\Entity\abonne;
use App\Entity\Emprunt;
use App\Entity\livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_emprunt')
            ->add('date_retour_prevue')
            ->add('date_retour_effective')
            ->add('livre_id', EntityType::class, [
                'class' => livre::class,
                'choice_label' => 'id',
            ])
            ->add('abonne_id', EntityType::class, [
                'class' => abonne::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
