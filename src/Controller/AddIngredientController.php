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
use App\Service\HasIngredient;

class AddIngredientController extends AbstractController
{
    /**
     * @Route("/add/ingredient", name="add_ingredient")
     */
    public function index(Request $request,HasIngredient $hasIngredient)
    {
        $id =$request->query->get('recette');
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->find($id);


        $form = $this->createForm(RecetteHasIngredientType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $recetteIngQuantity = $form->getData();
            $hasIngredient->addIngredient($recette,$recetteIngQuantity);


            $this->addFlash(
                'notice',
                'ingredient ajouté'
            );
            return $this->render('add_ingredient/index.html.twig', [
                'form' => $form->createView(),
            ]);}

        return $this->render('add_ingredient/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
