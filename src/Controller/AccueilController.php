<?php

namespace App\Controller;

use App\Entity\Timbre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(/*Response $response*/) {
//        $response->headers->setCookie(Cookie::create("__mamady_et_son_bb_test_cookie", "Ils s'aiment tous les deux", (1000 * 60 * 60 * 24 * 10)));
        return $this->render('accueil/index.html.twig', [
//            'timbre' => $this->getDoctrine()->getRepository(Timbre::class)->findBy(["id" => 1])[0],
        ]);
    }
}
