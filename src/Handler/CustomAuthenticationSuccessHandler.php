<?php


namespace App\Handler;


use App\Entity\Cart;
use App\Entity\User;
use App\Service\CookieService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class CustomAuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private $router;
    private $em;
    private $cookieService;
    private $accessAttemptService;

    public function __construct(RouterInterface $router, EntityManagerInterface $em, CookieService $cookieService) {
        $this->router = $router;
        $this->em = $em;
        $this->cookieService = $cookieService;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @throws \Exception
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {

        /* RETURN OPTIONS */
        $goToUrl = $this->router->generate('accueil');
        $response = new RedirectResponse($goToUrl);

        /** @var User $user */
        $user = $token->getUser();

        if ($cart = $this->em->getRepository(Cart::class)->findOneBy(["user" => $user, "isProcessed" => false])) {
            $this->cookieService->setCart($cart->getCode(), $response);
        } else if ($cart = $this->cookieService->getCart()) {
            $cart->setUser($user);
        }

        $this->em->flush();

        return $response;
    }
}