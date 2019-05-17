<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreatedRecetteSuccesController extends AbstractController
{
    /**
     * @Route("/created/recette/succes", name="created_recette_succes")
     */
    public function index()
    {
        return $this->render('created_recette_succes/index.html.twig', [
            'controller_name' => 'CreatedRecetteSuccesController',
        ]);
    }
}
