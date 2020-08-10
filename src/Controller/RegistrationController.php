<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\MembreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $membre = new Membre();


        $form = $this->createForm(MembreType::class, $membre);
        dump($request);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $hash = $encoder->encodePassword($membre,$membre->getPassword());
            //on recupere le mot de pass du formulaire (non hacher pour le moment) pour le transmettre a la methode encodeâssword
            //qui va se charger d'encoder le mot de passee

            $membre->setPassword($hash);//on envoie le mdp hacher ds le setteur de l'objet $user afin qu'il soit inserrer ds la bdd

//            switch($membre->getFunction()) {
//                case 'admin':
//                    $membre->setRoles(['ROLE_ADMIN']);
//                    break;
//                case 'user':
//                    $membre->setRoles(['ROLE_USER']);
//                    break;
//            }
            $manager->persist($membre);

            $manager->flush();
           return $this->redirectToRoute('security_login');//on redirige vers la page de connexion
        }

        return $this->render('registration/inscription.html.twig',[
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //renvoie le message d'erreur en cas de mauvais idenfitifients au moment de la connexion
        $error = $authenticationUtils->getLastAuthenticationError();

        //on recupere le dernier username (email) que l'internaute a saisie ds le formulaire de connexion
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('registration/login.html.twig',[
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {
        //cette fonction ne reourn rien , il ns suffit d'avoir pour route pour la deconnexion (voir security.yaml /firewalls)
    }
}
