<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Goodies;
use App\Entity\GoodiesLine;
use App\Entity\Stampwish;
use App\Entity\User;
use App\Form\StampwishType;
use App\Repository\StampwishRepository;
use App\Service\CookieService;
use App\Util\StringUtils;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        $user = $this->getUser();

        if (null === $user) {

        } else {
            $user = new User();
        }
        return $this->render('profil/profil.html.twig');
    }

    /**
     * @Route("/create", name="create_stampwish")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return RedirectResponse|Response
     */
    public function create(Request $request, EntityManagerInterface $manager, CookieService $cookieService)
    {
        $stampWish = new Stampwish($this->getUser());
        $form = $this->createForm(StampwishType::class, $stampWish);
        dump($request);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($stampWish);

            if (! $cart = $cookieService->getCart()) {
                $cart = new Cart();
                do {
                    $cart->setCode(StringUtils::randomCartCode());
                } while ($manager->getRepository(Cart::class)->findOneBy(["code" => $cart->getCode()]));
                $cart->setUser($this->getUser());
                // if ($this->getUser()) $cart->setUser($this->getUser());
                $manager->persist($cart);
            }

            $cart->addStampwish($stampWish);

            $manager->flush();
            $response = $this->redirectToRoute("stamp_wish_view", ["id" => $stampWish->getId()]);
            $cookieService->setCart($cart->getCode(), $response);
            return $response;
        }

        return $this->render('profil/createStampwish.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/view/{id}", name="stamp_wish_view")
     * @param Stampwish $stampwish
     * @return Response
     */
    public function show(Stampwish $stampwish) {
        return $this->render('profil/viewStampwish.html.twig', [
            'stampwish' => $stampwish,
        ]);
    }
    /**
     * @Route("/liste", name="liste")
     */
    public function liste()
    {

        return $this->render('profil/listeGoodies.html.twig', [
            'liste' => $this->getDoctrine()->getRepository(Goodies::class)->findAll()

        ]);
    }

    /**
     * @Route("/viewGoodies/{id}", name="viewGoodies")
     */
    public function showGoodies(Goodies $goodies)
    {
        return $this->render('profil/viewGoodies.html.twig',[
            'goodies' =>$goodies
        ]);
    }
    /**
     * @Route("/addToCart/{id}", name="addToCart")
     */
    public function addToCart(Goodies $goodies, CookieService $cookieService, EntityManagerInterface $manager)
    {
        if (! $cart = $cookieService->getCart()) {
            $cart = new Cart();
            do {
                $cart->setCode(StringUtils::randomCartCode());
            } while ($manager->getRepository(Cart::class)->findOneBy(["code" => $cart->getCode()]));
            $cart->setUser($this->getUser());
            // if ($this->getUser()) $cart->setUser($this->getUser());
            $manager->persist($cart);
        }

//        $cart->addStampwish($stampWish);
        $gLine = null;
        foreach ($cart->getGoodiesLines() as $line) {
            if ($line->getGoodies()->getId() == $goodies->getId()) {
                $line->setQuantity($line->getQuantity() + 1);
                $gLine = $line;
                break;
            }
        }
        if (!$gLine) $cart->getGoodiesLines()->add(new GoodiesLine($goodies, $cart));
        $manager->flush();

        $response = $this->redirectToRoute('cart');
        $cookieService->setCart($cart->getCode(), $response);
        $this->addFlash("success", "Le goodies " . $goodies->getTitle() . " a été ajouté avec succès dans le panier!");
        return $response;
    }
}
