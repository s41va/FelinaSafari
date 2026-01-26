<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class RegistroController extends AbstractController
{
    #[Route('/registro', name: 'app_registro')]
    public function registro(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher){
        $usuario = new User();
        $form = $this->createForm(RegistroType::class, $usuario);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Hashear la contraseña
            $hashedPassword = $passwordHasher->hashPassword($usuario, $usuario->getPassword());
            $em->persist($usuario);
            $usuario->setPassword($hashedPassword);
            $em->flush();
            $this->addFlash('success', 'Usuario registrado correctamente');
        return $this->redirectToRoute('login');
        }
        return $this->render('registro/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
