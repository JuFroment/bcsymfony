<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;

class CookieController extends AbstractController
{
    #[Route('/cookie', name: 'cookie_authorize')]
    public function index(Request $request): Response
    {
        $response = $this->redirect($request->headers->get('referer'));
        $response->headers->setCookie(New Cookie("accepted", 1));

        return $response;
    }
}
