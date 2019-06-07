<?php

namespace App\Form;

use App\Entity\RecetteHasIngredient;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RecetteHasIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('ingredient', EntityType::class, [
                // looks for choices from this entity
                'class' => Ingredient::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'name',])
            ->add('quantity')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecetteHasIngredient::class,
        ]);
    }
}
