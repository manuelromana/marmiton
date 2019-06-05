<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Recette;

use App\Service\CreateRecette;

class CreatedRecetteSuccesController extends AbstractController
{
    /**
     * @Route("/created/recette/succes", name="created_recette_succes")
     */
    public function index(Request $request)
    {
        $id =$request->query->get('recette');
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->find($id);
        if (!$recette) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        //dd($recette);
        return $this->render('created_recette_succes/index.html.twig', [
            'recette' => $recette,
        ]);
    }
}
