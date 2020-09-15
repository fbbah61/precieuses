<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index() {
        return $this->render('accueil/index.html.twig', [
//            'timbre' => $this->getDoctrine()->getRepository(Timbre::class)->findBy(["id" => 1])[0],
        ]);
    }
}
