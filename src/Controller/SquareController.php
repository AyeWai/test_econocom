<?php

namespace App\Controller;

use App\Service\SquareDisplayingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SquareController extends AbstractController
{

    /**
     * @Route("/square", name="square")
     */
    public function index(SquareDisplayingService $squareDisplayingService): Response
    {

        $colors = $squareDisplayingService->colorsArray($squareDisplayingService);
        return $this->render('square/new.html.twig', [
            'colors' => $colors,
        ]);
    }
}
