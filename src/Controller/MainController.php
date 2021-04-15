<?php

namespace App\Controller;

use App\Entity\Stories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {
        $stories= $this->getDoctrine()->getRepository(Stories::class)->findAll();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'stories'=>$stories,
        ]);
    }
}
