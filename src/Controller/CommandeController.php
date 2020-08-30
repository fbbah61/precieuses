<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\DetailCommande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index()
    {
        return $this->render('commande/commande.html.twig', [
            'commande' => $this->getDoctrine()->getRepository(Commande::class)->findBy( user)
        ]);
    }
    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function details(DetailCommande $detailCommande)
    {



        return $this->render('commande/detail.html.twig',[
            'detailCommande' =>$detailCommande
        ]);

    }
}

