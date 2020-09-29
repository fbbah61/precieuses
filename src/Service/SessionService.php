<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionService
{

    private $session;
    private $em;

    public function __construct(SessionInterface $session, EntityManagerInterface $em) {
        $this->session = $session;
        $this->em = $em;
    }

    /**
     * @return SessionInterface
     */
    public function getSession(): SessionInterface
    {
        return $this->session;
    }
}