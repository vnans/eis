<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use App\Repository\GallerieRepository;
use App\Repository\ParamsRepository;
use App\Repository\ProduitRepository;
use App\Repository\RealisationRepository;
use App\Repository\ServiceRepository;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(ServiceRepository $serviceRepository,RealisationRepository $realisationRepository,ProduitRepository $produitRepository,ClientRepository $clientRepository,GallerieRepository $gallerieRepository,ParamsRepository $paramsRepository)
    {
        return $this->render('default/index.html.twig', [
          'services' => $serviceRepository->findAll(),
          'realisations' => $realisationRepository->findAll(),
          'produits' => $produitRepository->findAll(),
          'clients' => $clientRepository->findAll(),
          'galleries' => $gallerieRepository->findAll(),
          'params' => $paramsRepository->findAll(),
        ]);
    }
}
