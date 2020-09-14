<?php

namespace App\Controller;

use App\Entity\Goodies;
use App\Entity\Stampwish;
use App\Entity\User;
use App\Form\StampwishType;
use App\Repository\StampwishRepository;
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
    public function create(Request $request, EntityManagerInterface $manager)
    {
            $stampWish = new Stampwish($this->getUser());



        $form = $this->createForm(StampwishType::class, $stampWish);
        dump($request);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($stampWish);
            $manager->flush();

            return $this->redirectToRoute("stamp_wish_view", ["id" => $stampWish->getId()]);
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
}
