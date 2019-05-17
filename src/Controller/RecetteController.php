<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="recette")
     */
    public function createRecette(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();


            $recette = new Recette();

        $form = $this->createFormBuilder($recette)
            ->add('name', TextType::class)
            ->add('Time', NumberType::class)
            ->add('difficulty', NumberType::class)
            ->add('little_describe', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create recette'])
            ->getForm();

        $form->handleRequest($request);
        //var_dump($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $recette = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $recette -> setCreatedAt(new \DateTime());
            $recette-> setUpdatedAt(new \DateTime());
            $recette->setUserId($user);


            $entityManager->persist($recette);
            $entityManager->flush();

            return $this->redirectToRoute('created_recette_succes');
        }

        return $this->render('recette/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
