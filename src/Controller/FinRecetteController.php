<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  App\Entity\RecetteHasIngredient;
use App\Entity\Recette;
use App\Entity\Ingredient;


class FinRecetteController extends AbstractController
{
    /**
     * @Route("/fin/recette/{slug}", name="fin_recette")
     */
    public function index($slug)
    {
        $id =$slug;
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->find($id);

        $repository = $this->getDoctrine()->getRepository(RecetteHasIngredient::class);
        $ingredients = $repository->findBy(
            [ 'recette'=> $recette]);
            foreach ($ingredients as &$value) {

                $value = $value->getIngredient()->getId();


            }

        $test = $this->getDoctrine()
            ->getRepository(Ingredient::class)
            ->find(1);

        //dd($test,$recette);
        /*if (!$pro) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }*/

        //return new Response('Check out this great product: '.$ingredients->getName());
        return $this->render('fin_recette/index.html.twig', [
            'controller_name' => 'FinRecetteController',
        ]);
    }
}
