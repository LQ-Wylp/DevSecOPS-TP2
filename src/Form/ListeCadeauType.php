<?php

namespace App\Form;

use App\Entity\ListeCadeau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListeCadeauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'w-100 rounded-3 py-1 px-2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListeCadeau::class,
        ]);
    }
}