<?php

namespace App\Controller;

use App\Entity\Cadeau;
use App\Form\CadeauType;
use App\Repository\CadeauRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function new(): Response
    {
        $cadeau = new Cadeau();

        $form = $this->createForm(CadeauType::class, $cadeau);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->persist($cadeau);
            $this->entityManager->flush();

            dd($cadeau);
            return $this->redirectToRoute('app_cadeau');
        }

        return $this->render('cadeau/new.html.twig',[
            'form' => $form,
        ]);
    }
}
