<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;
use App\Repository\SerieRepository;

class SerieController extends AbstractController
{
    /**
     * @Route("/serie", name="serie")
     */
    public function index()
    {
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }
    /**
     * @Route("/serie/update", name="serieupdate")
     */
    public function update() {
        $entityManager = $this->getDoctrine()->getManager();
        $serie = $this->getDoctrine()
        ->getRepository(Serie::class)
        ->find(1);
        print_r($serie);
        $seriesdq = new Serie();
        $serie->setLibelle('test');

        $entityManager->flush();
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }

    /**
     * @Route("/serie/get/{libelle}", name="serieget")
     */
    public function getByLibelle($libelle, SerieRepository $repo) {
        $val = $repo->findByLibelle($libelle);
        print_r($val);
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }

    public function getManager() {
        return $this->getDoctrine()->getManager();
    }

}
