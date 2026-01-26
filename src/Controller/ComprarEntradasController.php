<?php

namespace App\Controller;

class ComprarEntradasController
{
    #[Route('/entradas', name: 'app_entradas')]
    public function index(): Response
    {
        return $this->render('entradas/index.html.twig', [
            'controller_name' => 'ComprarEntradasController',
        ]);
    }
}
