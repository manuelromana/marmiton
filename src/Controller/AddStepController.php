<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Recette;
use App\Entity\Step;
use App\Form\AddStepType;
use App\Service\AddStep;

class AddStepController extends AbstractController
{
    /**
     * @Route("/add/step/{slug}", name="add_step")
     */
    public function index($slug,Request $request,AddStep $addStep)
    {

        $id =$slug;
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->find($id);

        $form = $this->createForm(AddStepType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $step = $form->getData();
            $addStep->addstep($recette,$step);


            $this->addFlash(
                'notice',
                'étape ajoutée'
            );


        }

        return $this->render('add_step/index.html.twig', [
            'form' => $form->createView(), 'id'=>$id
        ]);
    }
}
