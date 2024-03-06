<?php

namespace App\Controller;

use App\Entity\ListeCadeau;
use App\Form\ListeCadeauType;
use App\Repository\ListeCadeauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ListeCadeauController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ListeCadeauRepository $repoListeCadeau;

    public function __construct(EntityManagerInterface $entityManager, ListeCadeauRepository $repoListeCadeau)
    {
        $this->entityManager = $entityManager;
        $this->repoListeCadeau = $repoListeCadeau;
    }

    #[Route('/cadeau/liste', name: 'app_cadeau_liste')]
    public function index(): Response
    {
        $listeCadeaux = $this->repoListeCadeau->findAll();
        return $this->render('liste_cadeau/index.html.twig', [
            'listeCadeaux' => $listeCadeaux
        ]);
    }

    #[Route('/cadeau/liste/new', name: 'app_cadeau_liste_new')]
    public function new(Request $request): Response
    {
        $listeCadeau = new ListeCadeau();

        $form = $this->createForm(ListeCadeauType::class, $listeCadeau);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->persist($listeCadeau);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_cadeau_liste');
        }

        return $this->render('liste_cadeau/new.html.twig',[
            'form' => $form
        ]);
    }

    #[Route('/cadeau/liste/edit/{id}', name: 'app_cadeau_liste_edit')]
    public function edit(Request $request, ListeCadeau $listeCadeau): Response
    {
        $form = $this->createForm(ListeCadeauType::class, $listeCadeau);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->flush();
            return $this->redirectToRoute('app_cadeau_liste');
        }

        return $this->render('liste_cadeau/edit.html.twig',[
            'form' => $form
        ]);
    }

    #[Route('/cadeau/liste/delete/{id}', name: 'app_cadeau_liste_delete')]
    public function delete(Request $request, ListeCadeau $listeCadeau): Response
    {
        $this->entityManager->remove($listeCadeau);
        $this->entityManager->flush();
        return $this->redirectToRoute('app_cadeau_liste');
    }
}