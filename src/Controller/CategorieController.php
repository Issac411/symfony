<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use App\Form\CategorieType;


class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index()
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    /**
     * @Route("/categorie/add", name="categorieAdd")
     */
    public function add(Request $request) {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $this->addCategorie($categorie,$request);
        }
        return $this->render('categorie/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function addCategorie(Categorie $categorie, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        print_r($categorie);
        $entityManager->persist($categorie);
        $entityManager->flush();
    }

}
