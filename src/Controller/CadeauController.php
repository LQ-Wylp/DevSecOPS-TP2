<?php

namespace App\Controller;

use App\Entity\Cadeau;
use App\Form\CadeauType;
use App\Repository\CadeauRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class CadeauController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private CadeauRepository $cadeauRepository;

    public function __construct(EntityManagerInterface $entityManager, CadeauRepository $cadeauRepository)
    {
        $this->entityManager = $entityManager;
        $this->cadeauRepository = $cadeauRepository;
    }

    #[Route('/cadeau', name: 'app_cadeau')]
    public function index(): Response
    {
        $cadeaux = $this->cadeauRepository->findAll();
        return $this->render('cadeau/index.html.twig', [
            'cadeaux' => $cadeaux
        ]);
    }

    #[Route('/cadeau/new', name: 'app_cadeau_new')]
    public function new(Request $request): Response
    {
        $cadeau = new Cadeau();

        $form = $this->createForm(CadeauType::class, $cadeau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($cadeau);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_cadeau');
        }

        return $this->render('cadeau/new.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cadeau/edit/{id}/{redirect}', name: 'app_cadeau_edit')]
    public function edit(Request $request, Cadeau $cadeau, string $redirect): Response
    {
        $form = $this->createForm(CadeauType::class, $cadeau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute($redirect);
        }

        return $this->render('cadeau/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cadeau/delete/{id}/{redirect}', name: 'app_cadeau_delete')]
    public function delete(Request $request, Cadeau $cadeau, string $redirect): Response
    {
        $this->entityManager->remove($cadeau);
        $this->entityManager->flush();

        return $this->redirectToRoute($redirect);
    }
}
