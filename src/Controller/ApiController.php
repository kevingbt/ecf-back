<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api/livres', name: 'api_livres', methods: ['GET'])]
    public function livre_get(LivreRepository $livreRepository): JsonResponse
    {
        $livres = $livreRepository->findAll();

        $data = [];

        foreach ($livres as $livre) {
            $data[] = [
                'id' => $livre->getId(),
                'titre' => $livre->getTitre(),
                'auteur' => $livre->getAuteur(),
                'isbn' => $livre->getIsbn(),
                'date_publication' => $livre->getDatePublication(),
                'disponible' => $livre->isDisponible(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/livres/{id}', name: 'api_livres_details', methods: ['GET'])]
    public function livre_get_details(int $id, LivreRepository $livreRepository): JsonResponse
    {
        $livre = $livreRepository->find($id);

        if (!$livre) {
            throw $this->createNotFoundException('Le livre demandé n\'existe pas.');
        }

        return $this->json([
            'id' => $livre->getId(),
            'titre' => $livre->getTitre(),
            'auteur' => $livre->getAuteur(),
            'isbn' => $livre->getIsbn(),
            'date_publication' => $livre->getDatePublication(),
            'disponible' => $livre->isDisponible(),
        ]);
    }

    #[Route('/api/livre', name: 'api_livre_new', methods: ['POST'])]
    public function livre_post(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/livre/{id}', name: 'api_livre_edit', methods: ['PUT'])]
    public function livre_put(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/livres/{id}', name: 'api_livre_delete', methods: ['DELETE'])]
    public function livre_delete(int $id, LivreRepository $livreRepository): Response
    {
        $livre = $livreRepository->find($id);

        if (!$livre) {
            throw $this->createNotFoundException('Le livre demandé n\'existe pas.');
        }

        $livreRepository->delete($livre);

        return $this->redirectToRoute('api_livres', [], Response::HTTP_SEE_OTHER);
    }
}
