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

final class LoginController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function index(Request $request,RequestStack $requestStack): Response
    {

        $login = new Login();

        $form = $this->createForm(LoginType::class, $login);

        $form->handleRequest($request);

        $mapaUsuario = [
            "admin" => "admin",
            "user25" => "25",
            "user26" => "26",
        ];
        if ($form->isSubmitted() && $form->isValid()) {

            $username = $login->getUsername();
            $password = $login->getPassword();

            if (array_key_exists($username,  $mapaUsuario)) {

                if ($password == $mapaUsuario[$username]) {
                    $this->saveUserInSession($username);
                    $this->addFlash("success", "Bienvenido al sistema");
                }
            }else{
                $this->addFlash('error', 'Usuario o contraseña incorrectos');
                return $this->redirectToRoute('app_registro_usuarios');
            }
            return $this->redirectToRoute('app_home');

        }


        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    public function saveUserInSession(String $username): void{
        $session = $this->requestStack->getCurrentRequest()->getSession();
        $session->set('username', $username);

    }
}
