<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use App\Entity\Ingredient;
use App\Entity\RecetteHasIngredient;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\RecetteHasIngredientType;

class AddIngredientController extends AbstractController
{
    /**
     * @Route("/add/ingredient", name="add_ingredient")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(RecetteHasIngredientType::class);
        $form->handleRequest($request);

        return $this->render('add_ingredient/index.html.twig', [
            'controller_name' => 'AddIngredientController',
        ]);
    }
}
