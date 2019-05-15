<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomepageController extends AbstractController
{
    /**
     * @Route("/welcomepage", name="welcomepage")
     */
    public function index()
    {
        return $this->render('welcomepage/index.html.twig', [
            'controller_name' => 'WelcomepageController',

        ]);
    }
}
