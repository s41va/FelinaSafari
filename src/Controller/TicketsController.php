<?php

namespace App\Controller;

use App\Entity\Entradas;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TipoEntradaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TicketsController extends AbstractController
{
    #[Route('/buy-ticket/{typeId}', name: 'app_buy_ticket')]
    public function buy(
        int $typeId,
        EntityManagerInterface $entityManager,
        TipoEntradaRepository $tipoRepo
    ): Response {
        // 1. Get the currently logged-in user
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login'); // Security check
        }

        // 2. Find the ticket type (Adult, Child, etc.)
        $tipo = $tipoRepo->find($typeId);
        if (!$tipo) {
            throw $this->createNotFoundException('Ticket type not found');
        }

        // 3. Create the "Ticket" (Entrada)
        $entrada = new Entradas();
        $entrada->setUserId($user);
        $entrada->setTipoEntrada($tipo);
        $entrada->setFechaCompra(new \DateTime()); // Right now
        $entrada->setFechaVisita(new \DateTime('+7 days')); // Simulated visit for next week

        // 4. Save to Database
        $entityManager->persist($entrada);
        $entityManager->flush();

        // 5. Feedback
        $this->addFlash('success', 'Ticket comprado correctamente.');

        return $this->render('ticket/index.html.twig', [
            'entrada' => $entrada
        ]);
    }
}
