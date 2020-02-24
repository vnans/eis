<?php

namespace App\Controller;

use App\Entity\Gallerie;
use App\Form\GallerieType;
use App\Repository\GallerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;


/**
 * @Route("/gallerie")
 */
class GallerieController extends AbstractController
{
    /**
     * @Route("/", name="gallerie_index", methods={"GET"})
     */
    public function index(GallerieRepository $gallerieRepository): Response
    {
        return $this->render('gallerie/index.html.twig', [
            'galleries' => $gallerieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gallerie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gallerie = new Gallerie();
        $form = $this->createForm(GallerieType::class, $gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
          $file1 = $gallerie->getImg1();
          $file2 = $gallerie->getImg2();
          $file3 = $gallerie->getImg3();
          $file4 = $gallerie->getImg4();
          $file5 = $gallerie->getImg5();
          $file6 = $gallerie->getImg6();
          $file7 = $gallerie->getImg7();
          $file8 = $gallerie->getImg8();

          $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
          $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
          $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
          $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
          $fileName5 = $this->generateUniqueFileName().'.'.$file5->guessExtension();
          $fileName6 = $this->generateUniqueFileName().'.'.$file6->guessExtension();
          $fileName7 = $this->generateUniqueFileName().'.'.$file7->guessExtension();
          $fileName8 = $this->generateUniqueFileName().'.'.$file8->guessExtension();
          // moves the file to the directory where brochures are stored
          $file1->move($this->getParameter('images_directory'), $fileName1); // stock image dans /public/img
          $file2->move($this->getParameter('images_directory'), $fileName2);
          $file3->move($this->getParameter('images_directory'), $fileName3);
          $file4->move($this->getParameter('images_directory'), $fileName4);
          $file5->move($this->getParameter('images_directory'), $fileName5);
          $file6->move($this->getParameter('images_directory'), $fileName6);
          $file7->move($this->getParameter('images_directory'), $fileName7);
          $file8->move($this->getParameter('images_directory'), $fileName8);

          // enreg l'image
          $gallerie->setImg1($fileName1);
          $gallerie->setImg2($fileName2);
          $gallerie->setImg3($fileName3);
          $gallerie->setImg4($fileName4);
          $gallerie->setImg5($fileName5);
          $gallerie->setImg6($fileName6);
          $gallerie->setImg7($fileName7);
          $gallerie->setImg8($fileName8);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gallerie);
            $entityManager->flush();

            return $this->redirectToRoute('gallerie_index');
        }

        return $this->render('gallerie/new.html.twig', [
            'gallerie' => $gallerie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gallerie_show", methods={"GET"})
     */
    public function show(Gallerie $gallerie): Response
    {
        return $this->render('gallerie/show.html.twig', [
            'gallerie' => $gallerie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gallerie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gallerie $gallerie): Response
    {
        $form = $this->createForm(GallerieType::class, $gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
          $file1 = $gallerie->getImg1();
          $file2 = $gallerie->getImg2();
          $file3 = $gallerie->getImg3();
          $file4 = $gallerie->getImg4();
          $file5 = $gallerie->getImg5();
          $file6 = $gallerie->getImg6();
          $file7 = $gallerie->getImg7();
          $file8 = $gallerie->getImg8();

          $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
          $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
          $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
          $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
          $fileName5 = $this->generateUniqueFileName().'.'.$file5->guessExtension();
          $fileName6 = $this->generateUniqueFileName().'.'.$file6->guessExtension();
          $fileName7 = $this->generateUniqueFileName().'.'.$file7->guessExtension();
          $fileName8 = $this->generateUniqueFileName().'.'.$file8->guessExtension();
          // moves the file to the directory where brochures are stored
          $file1->move($this->getParameter('images_directory'), $fileName1); // stock image dans /public/img
          $file2->move($this->getParameter('images_directory'), $fileName2);
          $file3->move($this->getParameter('images_directory'), $fileName3);
          $file4->move($this->getParameter('images_directory'), $fileName4);
          $file5->move($this->getParameter('images_directory'), $fileName5);
          $file6->move($this->getParameter('images_directory'), $fileName6);
          $file7->move($this->getParameter('images_directory'), $fileName7);
          $file8->move($this->getParameter('images_directory'), $fileName8);

          // enreg l'image
          $gallerie->setImg1($fileName1);
          $gallerie->setImg2($fileName2);
          $gallerie->setImg3($fileName3);
          $gallerie->setImg4($fileName4);
          $gallerie->setImg5($fileName5);
          $gallerie->setImg6($fileName6);
          $gallerie->setImg7($fileName7);
          $gallerie->setImg8($fileName8);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallerie_index');
        }

        return $this->render('gallerie/edit.html.twig', [
            'gallerie' => $gallerie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gallerie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gallerie $gallerie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gallerie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gallerie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gallerie_index');
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
