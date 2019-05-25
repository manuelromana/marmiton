<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recette;
use App\Entity\User;

class CreateRecette
{
private $em;

public function __construct(EntityManagerInterface $em)
{
    $this->em = $em;
}

public function setRecette($recette, $user)
{
    $em = $this->em;

    //$em = $this->getDoctrine()->getManager();

    $recette -> setCreatedAt(new \DateTime());
    $recette-> setUpdatedAt(new \DateTime());


    $recette->setUserId($user);


    $em->persist($recette);
    $em->flush();

}
}