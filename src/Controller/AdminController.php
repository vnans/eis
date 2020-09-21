<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Repository\RealisationRepository;
use App\Repository\ServiceRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/produits", name="adminProduit")
     */
    public function produit(ProduitRepository $produitRepository)
    {
        return $this->render('admin/produit.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }


    /**
     * @Route("/realisations", name="adminRealisation")
     */
    public function realisation(RealisationRepository $realisationRepository)
    {
        return $this->render('admin/realisation.html.twig', [
            'realisations' => $realisationRepository->findAll(),
        ]);
    }


    /**
     * @Route("/services", name="adminService")
     */
    public function service(ServiceRepository $serviceRepository)
    {
        return $this->render('admin/service.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }
}
