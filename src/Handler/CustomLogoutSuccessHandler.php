<?php


namespace App\Handler;


use App\Service\CookieService;
use App\Util\CookieKeys;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class CustomLogoutSuccessHandler implements LogoutHandlerInterface
{
    private $cookieService;

    public function __construct(CookieService $cookieService)
    {
        $this->cookieService = $cookieService;
    }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        // TODO: Implement logout() method.
//        $response->headers->clearCookie(CookieKeys::CART);
        $this->cookieService->setCart("", $response);
        return $response;
    }
}