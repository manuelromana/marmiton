<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recette;
use App\Entity\Step;

class AddStep
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function addstep($recette,$step)
    {
        $em = $this->em;
        $step->setrecette($recette);
        $em->persist($step);
        $em->flush();

    }



}