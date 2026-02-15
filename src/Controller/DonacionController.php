<?php

namespace App\Controller;

use App\Entity\Donacion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DonacionController extends AbstractController
{
    #[Route('/donar', name: 'app_donacion')]
    public function index(): Response
    {
        return $this->render('donacion/index.html.twig');
    }

    #[Route('/donar/procesar', name: 'app_donacion_procesar', methods: ['POST'])]
    public function procesar(Request $request, EntityManagerInterface $entityManager): Response
    {
        $importe = $request->request->get('importe');
        $esAnonimo = $request->request->get('anonimo') === '1';

        $donacion = new Donacion();
        $donacion->setImporte((float)$importe);

        // Lógica de anonimato:
        // Si NO es anónimo y el usuario está logueado, lo asignamos.
        // Si es anónimo o no hay usuario, se queda en NULL automáticamente.
        if (!$esAnonimo && $this->getUser()) {
            $donacion->setUser($this->getUser());
        } else {
            $donacion->setUser(null);
        }

        $entityManager->persist($donacion);
        $entityManager->flush();

        $this->addFlash('success', '¡Gracias por tu donación simulada de ' . $importe . '€!');

        return $this->redirectToRoute('app_donacion_index');
    }
}
