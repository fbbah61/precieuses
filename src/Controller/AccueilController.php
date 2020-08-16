<?php

namespace App\Controller;

use App\Entity\Timbre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'timbre' => $this->getDoctrine()->getRepository(Timbre::class)->findBy(["id" => 1])[0],
        ]);
    }
}
