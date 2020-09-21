<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;

/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

          // ajouter d'image
          $file1 = $client->getImg1();
          $file2 = $client->getImg2();
          $file3 = $client->getImg3();
          $file4 = $client->getImg4();
          $file5 = $client->getImg5();
          $file6 = $client->getImg6();
          $file7 = $client->getImg7();
          $file8 = $client->getImg8();
// recuperer lextention
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
          $client->setImg1($fileName1);
          $client->setImg2($fileName2);
          $client->setImg3($fileName3);
          $client->setImg4($fileName4);
          $client->setImg5($fileName5);
          $client->setImg6($fileName6);
          $client->setImg7($fileName7);
          $client->setImg8($fileName8);


            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_show", methods={"GET"})
     */
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
          $file1 = $client->getImg1();
          $file2 = $client->getImg2();
          $file3 = $client->getImg3();
          $file4 = $client->getImg4();
          $file5 = $client->getImg5();
          $file6 = $client->getImg6();
          $file7 = $client->getImg7();
          $file8 = $client->getImg8();

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
          $client->setImg1($fileName1);
          $client->setImg2($fileName2);
          $client->setImg3($fileName3);
          $client->setImg4($fileName4);
          $client->setImg5($fileName5);
          $client->setImg6($fileName6);
          $client->setImg7($fileName7);
          $client->setImg8($fileName8);


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Client $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('client_index');
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
