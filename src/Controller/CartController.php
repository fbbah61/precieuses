<?php

namespace App\Controller;

use App\Service\CookieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index() {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    public function countAndSumCart(CookieService $cookieService) {
        $count = 0;
        if ($cart = $cookieService->getCart()) {
            $count = $cart->getStampwishes()->count();
            foreach ($cart->getGoodiesLines() as $line) $count += $line->getQuantity();
        }
        return new Response($count);
    }
}
