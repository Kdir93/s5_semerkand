<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ProductRepository $dergiRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Anasayfa',
            'dergi_matba' => $dergiRepository->findBy(['product_type'=>1]),
            'dergi_dijital' => $dergiRepository->findBy(['product_type'=>2]),
            'dergi_uygulama' => $dergiRepository->findBy(['product_type'=>3])
        ]);
    }
}
