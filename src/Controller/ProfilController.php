<?php

namespace App\Controller;

use App\Entity\Goodies;
use App\Entity\Stampwish;
use App\Entity\User;
use App\Form\StampwishType;
use App\Repository\StampwishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $stampwish = new Stampwish();


        $form = $this->createForm(StampwishType::class, $stampwish);
        dump($request);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {


            $manager->persist($stampwish);

            $manager->flush();
            return $this->redirectToRoute('view');

        }
        return $this->render('profil/createStampwish.html.twig',[
        'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/view", name="view")
     */
    public function show()
    {

        return $this->render('profil/viewStampwish.html.twig', [
            'stampwish' => $this->getDoctrine()->getRepository(Stampwish::class)->findAll()

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
