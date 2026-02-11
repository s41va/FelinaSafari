<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HorariosController extends AbstractController
{
    #[Route('/horarios', name: 'app_horarios')]
    public function index(): Response
    {
        return $this->render('horarios/index.html.twig', [
            'controller_name' => 'HorariosController',
        ]);
    }
}
