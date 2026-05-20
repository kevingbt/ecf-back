<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class ApiController extends AbstractController
{

    #[Route('/livres', name: 'api_livres', methods: ['GET'])]
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
 
    #[Route('/livres/{id}', name: 'api_livres_details', methods: ['GET'])]
    public function livre_get_details(int $id, LivreRepository $livreRepository): JsonResponse
    {
        $livre = $livreRepository->find($id);

        if (!$livre) {
            return new JsonResponse([
                'status' => 'Le livre demandé n\'existe pas.',
            ], Response::HTTP_OK);
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

    #[Route('/livres', name: 'api_livre_new', methods: ['POST'])]
    public function livre_post(Request $request, EntityManagerInterface $entityManager): Response
    {

        $payload = $request->getPayload();

        $livre = new Livre();
        $livre->setTitre($payload->getString('titre'));
        $livre->setAuteur($payload->getString('auteur'));
        $livre->setIsbn($payload->getInt('isbn'));
        $livre->setDatePublication(new \DateTime($payload->getString('date_publication')));
        $livre->setDisponible($payload->getBoolean('disponible'));

        $entityManager->persist($livre);
        $entityManager->flush();

        return new JsonResponse([
            'status' => 'Livre créé avec succès',
            'id' => $livre->getId()
        ], Response::HTTP_CREATED);
    }

    #[Route('/livres/{id}', name: 'api_livre_edit', methods: ['PUT'])]
    public function livre_put(int $id, Request $request, EntityManagerInterface $entityManager, LivreRepository $livreRepository): Response
    {
        $livre = $livreRepository->find($id);

        if (!$livre) {
            return new JsonResponse([
                'status' => 'Le livre demandé n\'existe pas.',
            ], Response::HTTP_OK);
        }

        $payload = $request->getPayload();

        if ($payload->has('titre')) {
            $livre->setTitre($payload->getString('titre'));
        }
        if ($payload->has('auteur')) {
            $livre->setAuteur($payload->getString('auteur'));
        }
        if ($payload->has('isbn')) {
            $livre->setIsbn($payload->getInt('isbn'));
        }
        if ($payload->has('date_publication')) {
            $livre->setDatePublication(new \DateTime($payload->getString('date_publication')));
        }
        if ($payload->has('disponible')) {
            $livre->setDisponible($payload->getBoolean('disponible'));
        }

        $entityManager->persist($livre);
        $entityManager->flush();

        return new JsonResponse([
            'status' => 'Livre mis à jour avec succès',
            'id' => $livre->getId()
        ], Response::HTTP_OK);
    }

    #[Route('/livres/{id}', name: 'api_livre_delete', methods: ['DELETE'])]
    public function livre_delete(int $id, EntityManagerInterface $entityManager, LivreRepository $livreRepository): Response
    {
        $livre = $livreRepository->find($id);

        if (!$livre) {
            return new JsonResponse([
                'status' => 'Le livre demandé n\'existe pas.',
            ], Response::HTTP_OK);
        }

        $entityManager->remove($livre);
        $entityManager->flush();

        return $this->redirectToRoute('api_livres', [], Response::HTTP_SEE_OTHER);
    }
}
