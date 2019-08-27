<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{
    /**
     * @Route("/registration", name="user_registration")
     */
    public function registration(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $encoder
    )
    {
        //$this->getUser();
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            //Gérer le mot de passe : encodage
            $password = $encoder->encodePassword($user, $user->getPasswordPlain());
            $user->setPassword($password);
            //Gérer le role


            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'utilisateur ajouté');
        } else {
            echo 'ici';
        }


        return $this->render('user/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request){
        $session = $request->getSession();
        dump($session);
        $errors = $authenticationUtils->getLastAuthenticationError();
        dump($errors);
        $lastname = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'lastusername' => $lastname,
            'error' => $errors
        ]);
    }


    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout(){

        return $this->render('user/login.html.twig', [
        ]);
    }



}
