<?php

namespace App\Controller;

class FelinosController
{
    #[Route('/felinos', name: 'app_felinos')]
    public function index(): Response
    {
        return $this->render('felinos/index.html.twig', [
            'controller_name' => 'FelinosController',
        ]);
    }
}
