<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MessageGenerator;


class WelcomepageController extends AbstractController
{
    /**
     * @Route("/", name="welcomepage")
     */
    public function index(MessageGenerator $messageGenerator)
    {

        $message = $messageGenerator->getHappyMessage();
        $this->addFlash('success', $message);
        
        return $this->render('welcomepage/index.html.twig', [
            'controller_name' => 'WelcomepageController',

        ]);
    }


}
