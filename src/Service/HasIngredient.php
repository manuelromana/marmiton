<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recette;
use App\Entity\RecetteHasIngredient;
use App\Entity\Ingredient;

class HasIngredient
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function addIngredient($recette, $ingredient,$recettehasingredient)
    {
        $em = $this->em;
        $recettehasingredient->setrecette($recette);
        $recettehasingredient->setingredient($ingredient);

        $em->persist($recettehasingredient);
        $em->flush();

    }

}