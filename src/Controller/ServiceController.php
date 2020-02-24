<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;

/**
 * @Route("/service")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("/", name="service_index", methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
          $file1 = $service->getImage();
          $file2 = $service->getPiecejointe();
          // recuperer lextention
          $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
          $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                    // moves the file to the directory where brochures are stored
          $file1->move($this->getParameter('images_directory'), $fileName1); // stock image dans /public/img
          $file2->move($this->getParameter('images_directory'), $fileName2); // stock image dans /public/img

                    // enreg l'image
          $service->setImage($fileName1);
          $service->setPiecejointe($fileName2);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('service_index');
        }

        return $this->render('service/new.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_show", methods={"GET"})
     */
    public function show(Service $service): Response
    {
        return $this->render('service/show.html.twig', [
            'service' => $service,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Service $service): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
          $file1 = $service->getImage();
          $file2 = $service->getPiecejointe();
          // recuperer lextention
          $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
          $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                    // moves the file to the directory where brochures are stored
          $file1->move($this->getParameter('images_directory'), $fileName1); // stock image dans /public/img
          $file2->move($this->getParameter('images_directory'), $fileName2); // stock image dans /public/img

                    // enreg l'image
          $service->setImage($fileName1);
          $service->setPiecejointe($fileName2);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('service_index');
        }

        return $this->render('service/edit.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Service $service): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($service);
            $entityManager->flush();
        }

        return $this->redirectToRoute('service_index');
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
