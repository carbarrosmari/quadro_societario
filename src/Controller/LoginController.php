<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authUtils): Response
    {
        $data['erro'] = $authUtils->getLastAuthenticationError();
        $data['lastUsername'] = $authUtils->getLastUsername();   

        return $this->render('login/index.html.twig', $data);
    }
}
