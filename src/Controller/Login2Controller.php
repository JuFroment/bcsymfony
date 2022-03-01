<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Login2Controller extends AbstractController
{
    #[Route('/login-2', name: 'login-2')]
    public function index(): Response
    {
        return $this->render('login2/login.html.twig', [
            'controller_name' => 'Login2Controller',
        ]);
    }

    #[Route('register-2', name: 'register-2')]
    public function register(): Response {
        return $this->render('login2/register.html.twig', [
            'controller_name'=>'Login2Controller'
        ]);
    }
}
