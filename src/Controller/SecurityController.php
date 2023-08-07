<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    // Route pour la page de login
    #[Route(path: '/', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupération de la dernière erreur d'authentification, s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupération du dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        // Affichage de la page de login avec les informations récupérées
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    // Route pour la déconnexion de l'utilisateur
    #[Route(path: '/logout==', name: 'app_logout')]
    public function logout(): Response
    {
        // Redirection vers la page de login
        return $this->redirectToRoute('app_login');
    }
}

