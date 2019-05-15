<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
<<<<<<< HEAD
=======
use App\Security\LoginFormAuthenticator;
>>>>>>> origin/login
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
<<<<<<< HEAD

=======
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
>>>>>>> origin/login

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
<<<<<<< HEAD
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
=======
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
>>>>>>> origin/login
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

<<<<<<< HEAD
            return $this->redirectToRoute('app_login');
=======
            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
>>>>>>> origin/login
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
<<<<<<< HEAD

=======
>>>>>>> origin/login
}
