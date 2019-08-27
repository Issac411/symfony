<?php

namespace App\Controller;
use App\Entity\Idee;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\IdeeType;
use App\Repository\IdeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class IdeeController extends AbstractController
{
    /**
     * @Route("/idee", name="idee")
     */
    public function index(Request $request)
    {

        $idee = new Idee();
        $formIdee = $this->createForm(IdeeType::class,$idee);
        $formIdee->handleRequest($request);
        if($formIdee->isSubmitted()) {
            dump($idee);
            $idee->setIsPublished(true);
            if($formIdee->isValid()) {
                if($formIdee['file']->getData()) {
                    $theFile = $formIdee['file']->getData();
                    $name = $theFile->getClientOriginalName();
                    $theFile->move(
                        $this->getParameter('file_uploads'),
                        $name
                    );
                    $idee->setFile($name);
                }
                
                $this->addIdee($idee,$request);
            } else {
                echo 'pas valide';
            }
        }
        return $this->render('idee/index.html.twig', [
            'controller_name' => 'IdeeController',
            'form' => $formIdee->createView()
        ]);
    }


    public function addIdee(Idee $idee, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($idee);
        $entityManager->flush();

    }

    /**
     * @Route("/idee/add", name="ideeAdd")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $idee = new idee();
        $idee->setTitle('test');
        $idee->setAuthor('jojo');
        $entityManager->persist($idee);
        $entityManager->flush();
        
    }

    /**
     * @Route("/idee/delete/{id}", name="ideeDelete")
     */
    public function deleteIdee(Idee $idee, Request $request,IdeeRepository $repo) {
        $entityManager = $this->getDoctrine()->getManager();
        $idee->setIsPublished(0);
        $entityManager->flush();
        return $this->listeElement($repo);
    }

    /**
     * @Route("/idee/joinFile/{id}", name="ideeJoinFile")
     */
    public function joinFile(Idee $idee, Request $request, IdeeRepository $repo) {
        $file = $request->get('myFile');
        $idee = new idee();
        $form = $this->createForm(IdeeType::class, $idee);
        $idee->setFile($file);
        $entityManager = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        $file->move($this->getTargetDirectory(), $fileName);

        /*$file->move(
            $this->getParameter('brochures_directory'),
            $newFilename
        );*/
        $entityManager->flush();
        return $this->listeElement($repo);
    }
    /**
     * @Route("/idee/liste", name="ideeliste")
     */
    public function listeElement(IdeeRepository $repo)
    {
        $elements = $repo->findAllByPublished();

        return $this->render('idee/liste.html.twig', [
            'controller_name' => 'IdeeController',
            'elements' => $elements
        ]);
    }

    /**
     * @Route("/idee/get/{id}", name="ideedetail")
     */
    public function getById($id,Request $request) {
        $element = $this->getDoctrine()
        ->getRepository(Idee::class)
        ->find($id);
        

        return $this->render('idee/detail.html.twig', [
            'controller_name' => 'idee',
            'idee' => $element
        ]);
    }


}
