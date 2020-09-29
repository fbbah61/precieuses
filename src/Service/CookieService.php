<?php


namespace App\Service;


use App\Entity\Cart;
use App\Util\CookieKeys;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class CookieService {

    private $em;
    private $requestStack;
    private $sessionService;
    private $container;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em, SessionService $sessionService, ContainerInterface $container)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;
        $this->sessionService = $sessionService;
        $this->container = $container;
    }

    public function getPrefix() {
        return "__" ;
    }

    /**
     * @return Cart|null
     */
    public function getCart(): ?Cart {
        $code = $this->getRequest()->cookies->get($this->getPrefix() .  CookieKeys::CART, "");
        return $this->em->getRepository(Cart::class)->findOneBy(["isProcessed" => false, "code" => $code]);
    }

    public function setCart(string $code, Response &$response) {
        $response->headers->setCookie(Cookie::create($this->getPrefix() . CookieKeys::CART, $code, (time() + 1 * 365 * 24 * 60 * 60)));
    }

    /*public function getRecentlyViewed(): ?RecentlyViewed {
        $uuid = $this->getRequest()->cookies->get($this->getPrefix() . CookieKeys::RECENTLY_VIEWED, "");
        return $this->em->getRepository(RecentlyViewed::class)->findOneBy(["uuid" => $uuid, "country" => $this->getSessionService()->getCountry()]);
    }*/

    /*public function getUnprocessedCommandCartByUser(User $user): ?CommandCart {
        return $this->em->getRepository(CommandCart::class)->findOneBy(["processed" => false, "user" => $user, "country" => $this->getSessionService()->getCountry()]);
    }*/

    /*public function getRecentlyViewedByUser(User $user): ?RecentlyViewed {
        return $this->em->getRepository(RecentlyViewed::class)->findOneBy(["user" => $user, "country" => $this->getSessionService()->getCountry()]);
    }*/

    /*public function setRecentlyViewed(string $uuid, Response &$response) {
        $response->headers->setCookie(Cookie::create($this->getPrefix() . CookieKeys::RECENTLY_VIEWED, $uuid, (time() + 2 * 365 * 24 * 60 * 60)));
    }*/

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->requestStack->getCurrentRequest();
    }

    /**
     * @return SessionService
     */
    public function getSessionService(): SessionService
    {
        return $this->sessionService;
    }




    /* EXTRAS */

    /*public function getLastURI(): ?string {
        return $this->getRequest()->cookies->get(CookieKeys::LAST_REQUEST_URI);
    }*/

    /*public function setLastURI(string $uri, Response &$response) {
        $response->headers->setCookie(Cookie::create(CookieKeys::LAST_REQUEST_URI, $uri, (time() + 2 * 365 * 24 * 60 * 60)));
    }*/



    /*public function getLocale(): ?string {
        return $this->getRequest()->cookies->get(CookieKeys::USER_LOCALE);
    }*/

    /*public function setLocale(string $locale, Response &$response) {
        $response->headers->setCookie(Cookie::create(CookieKeys::USER_LOCALE, $locale, (time() + 2 * 365 * 24 * 60 * 60)));
    }*/

    /*public function requestedLocale(): ?string {
        if ($locale = $this->getRequest()->get(RequestKeys::USER_LOCALE) and in_array($locale, ["en", "fr"])) return $locale;
        return null;
    }*/

    /*public function resolveRequestedLocale(): void {
        if ($locale = $this->requestedLocale()) {
            $this->getSessionService()->setLocaleString($locale);
            $this->getRequest()->setLocale($locale);
        }
        elseif (!$locale = $this->getSessionService()->getLocaleString()) {
            if ($locale = $this->getLocale()) {
                $this->getSessionService()->setLocaleString($locale);
                $this->getRequest()->setLocale($locale);
            }
        }
        elseif ($locale !== $this->getRequest()->getLocale()) $this->getRequest()->setLocale($locale);
    }*/


    /*public function getCountry(): ?Country {
        return $this->em->getRepository(Country::class)->findOneByIsocodeAndActive($this->getRequest()->cookies->get(CookieKeys::USER_COUNTRY));
    }*/

    /*public function setCountry(string $isocode, Response &$response) {
        $response->headers->setCookie(Cookie::create(CookieKeys::USER_COUNTRY, $isocode, (time() + 2 * 365 * 24 * 60 * 60)));
    }*/


    /*public function requestedCountry(): ?Country {
        if ($isocode = $this->getRequest()->get(RequestKeys::PREFERRED_COUNTRY)) return $this->em->getRepository(Country::class)->findOneByIsocodeAndActive($isocode);
        return null;
    }*/

    /*public function resolveRequestedCountry(): void {
        if ($country = $this->requestedCountry()) $this->getSessionService()->setSessionCountry($country);
        elseif (!$country = $this->getSessionService()->getCountry()) {
            if ($country = $this->getCountry()) $this->getSessionService()->setSessionCountry($country);
            else {
                $geoLiteDatabasePath = $this->container->getParameter('internal_resources_directory') . '/GeoLite2-City.mmdb';
                try {
                    $ip = $this->getRequest()->getClientIp();
                    $record = (new Reader($geoLiteDatabasePath))->city((substr($ip, 0, 8) === "192.168." or "127.0.0.1" === $ip) ? "41.242.89.152" : $ip);
                    $country = $this->em->getRepository(Country::class)->findOneByIsocodeAndActive($record->country->isoCode);
                } catch (\Exception $e) {}

                if ($country) $this->getSessionService()->setSessionCountry($country);
                else $this->getSessionService()->setSessionCountry($this->em->getRepository(SystemSetting::class)->findBy([], ["id" => "DESC"])[0]->getDefaultUserCountry());
            }
        }
    }*/


    /*public function getCurrency(): ?Currency {
        return $this->em->getRepository(Currency::class)->findOneByIsocodeAndShown($this->getRequest()->cookies->get(CookieKeys::USER_CURRENCY));
    }*/

    /*public function setCurrency(string $isocode, Response &$response) {
        $response->headers->setCookie(Cookie::create(CookieKeys::USER_CURRENCY, $isocode, (time() + 2 * 365 * 24 * 60 * 60)));
    }*/

    /*public function requestedCurrency(): ?Currency {
        if ($isocode = $this->getRequest()->get(RequestKeys::PREFERRED_CURRENCY)) return $this->em->getRepository(Currency::class)->findOneByIsocodeAndShown($isocode);
        return null;
    }*/

    /*public function resolveRequestedCurrency(): void {
        if ($currency = $this->requestedCurrency()) $this->getSessionService()->setSessionCurrency($currency);
        elseif (!$currency = $this->getSessionService()->getCurrency()) {
            if ($currency = $this->getCurrency()) $this->getSessionService()->setSessionCurrency($currency);
            elseif ($currency = $this->getSessionService()->getCountry()->getCurrency() and $currency->getIsShown()) $this->getSessionService()->setSessionCurrency($currency);
            else $this->getSessionService()->setSessionCurrency($this->em->getRepository(SystemSetting::class)->findBy([], ["id" => "DESC"])[0]->getDefaultUserCurrency());
        }
    }*/
}