<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AbonneController extends AbstractController
{
    #[Route('/abonne', name: 'app_abonne')]
    public function index(): Response
    {
        return $this->render('abonne/index.html.twig', [
            'controller_name' => 'AbonneController',
        ]);
    }
}
