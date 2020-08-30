<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConceptController extends AbstractController
{
    /**
     * @Route("/concept", name="concept")
     */
    public function index()
    {
        return $this->render('concept/index.html.twig', [
            'title' => 'Concept',
            'title0' => 'A PROPOS',
            'title1' => 'POUR QUI ?',
            'title2' => 'LES CONCEPTRICES',
            'title3' => 'CONCEPT',
            'piclorem' => 'https://picsum.photos/900/330'
        ]);
    }
}
