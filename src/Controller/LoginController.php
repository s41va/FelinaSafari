<?php

namespace App\Controller;

use App\Entity\Login;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController extends AbstractController
{

    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }
        // Obtener el error de login si hay
        $error = $authenticationUtils->getLastAuthenticationError();
        // Último username ingresado por el usuario
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        // Este método nunca se ejecuta, Symfony se encarga del logout automáticamente.
        throw new \Exception('Este método puede estar vacío, será interceptado por el firewall
de Symfony.');
    }
}
