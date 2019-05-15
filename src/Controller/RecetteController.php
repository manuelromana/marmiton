<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="recette")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $recette = new Recette();
        $recette -> setName('gratin');
        $recette -> setCreatedAt(new \DateTime());
        $entityManager->persist($recette);
        $entityManager->flush();

        /*return $this->render('recette/index.html.twig', [
            'controller_name' => 'RecetteController',
        ]);*/
        return new Response('enregistré nouvelle recette de'.$recette->getName());

    }
}
