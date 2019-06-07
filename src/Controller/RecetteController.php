<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use App\Entity\User;
use App\Service\CreateRecette;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Recette2Type;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="recette")
     */
    public function createRecette(Request $request,CreateRecette $createRecette)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        $form = $this->createForm(Recette2Type::class);
        

        $form->handleRequest($request);
        //var_dump($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $recette = $form->getData();
            $createRecette->setRecette($recette,$user);


            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            return $this->redirectToRoute('add_ingredient', [
            'recette' => $recette->getId()
            ]);
            //return new Response($recette->getTime());
           //return $this->redirectToRoute('created_recette_succes');
            //return $this->redirectToRoute('created_recette_succes', $request->query->all());
        }


        return $this->render('recette/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }

}
