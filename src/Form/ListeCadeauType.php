<?php

namespace App\Form;

use App\Entity\Cadeau;
use App\Entity\ListeCadeau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ListeCadeauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cadeaux', EntityType::class, [
                'class' => Cadeau::class,
                'multiple' => true,
                'choice_label' => function (Cadeau $cadeau) {
                    $accessor = PropertyAccess::createPropertyAccessor();
                    $nom = $accessor->getValue($cadeau, 'nom');
                    $prix = $accessor->getValue($cadeau, 'prix');
                    return sprintf('%s - %s', $nom, $prix);
                },
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