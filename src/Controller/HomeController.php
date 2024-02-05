<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('./accueil.html.twig');
    }

    #[Route('/a-propos', name: 'a-propos')]
    public function about(): Response
    {
        return $this->render('./a-propos.html.twig');
    }

    // Projets
    #[Route('/projets', name: 'projets')]
    public function projets(ProjetRepository $projetRepo): Response
    {
        $projets = $projetRepo->findAll();

        return $this->render('./projets.html.twig', [
            'projets' => $projets,
        ]);
    }

    // Projet type
    #[Route('/projets/projet-type', name: 'projet-type')]
    public function show(): Response
    {
        return $this->render('./projet-type.html.twig');
    }

    #[Route('/menu', name: 'menu')]
    public function menu(): Response
    {
        return $this->render('./menu.html.twig');
    }
}
