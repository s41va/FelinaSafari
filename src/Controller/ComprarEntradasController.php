<?php

namespace App\Controller;

use App\Entity\Entradas;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ComprarEntradasController extends AbstractController
{
    #[Route('/entradas', name: 'app_entradas', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('entradas/index.html.twig');
    }

    #[Route('/entradas/comprar', name: 'app_entradas_proceso', methods: ['POST'])]
    public function comprar(Request $request, EntityManagerInterface $entityManager): Response
    {
        // 1. Obtener datos del formulario (simulado)
        $tipo = $request->request->get('tipo_entrada');
        $fechaVisitaStr = $request->request->get('fecha_visita');

        // 2. Validar que el usuario esté logueado
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Debes iniciar sesión para comprar.');
            return $this->redirectToRoute('app_login');
        }

        // 3. Crear y configurar la entidad
        $entrada = new Entradas();
        $entrada->setUserId($user); // Suponiendo que la relación está bien definida
        $entrada->setTipoEntrada($tipo);
        $entrada->setFechaCompra(new \DateTime()); // Fecha actual
        $entrada->setFechaVisita(new \DateTime($fechaVisitaStr));

        // 4. Persistir en la base de datos
        try {
            $entityManager->persist($entrada);
            $entityManager->flush();

            $this->addFlash('success', '¡Entrada comprada con éxito!');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Hubo un error al procesar la compra.');
        }

        return $this->redirectToRoute('app_entradas');
    }
}
