<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ComprarEntradasController extends AbstractController
{
    #[Route('/entradas', name: 'app_entradas')]
    public function index(): Response
    {
        return $this->render('entradas/index.html.twig', [
            'controller_name' => 'ComprarEntradasController',
        ]);
    }
}
