<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    protected $requestStack;

    #[Route('/home', name: 'app_home')]
    public function index(RequestStack $requestStack): Response
    {

        $request = $requestStack->getCurrentRequest();

        // Obtenemos la sesión desde la petición
        $session = $request->getSession();

        // Obtenemos el username
        $username = $session->get('username');

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'username' => $username,
        ]);
    }
}
