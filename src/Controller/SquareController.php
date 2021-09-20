<?php

namespace App\Controller;

use App\Service\SquareDisplayingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SquareController extends AbstractController
{

    /**
     * @Route("/square", name="square")
     */
    public function square_displaying(SquareDisplayingService $squareDisplayingService): Response
    {

        $colors = $squareDisplayingService->colorsArray($squareDisplayingService);
        return $this->render('square/new.html.twig', [
            'colors' => $colors,
        ]);
    }

    /**
     * @Route("/squarev2", name="squarev2")
     */

    public function square_displayingv2(SquareDisplayingService $squareDisplayingService, Request $request): Response
    {
        $slug = $request->request->get('nombre');

        $color = $squareDisplayingService->colorOne($squareDisplayingService, $slug);
        return $this->render('square/newv2.html.twig', [
            'color' => $color,
        ]);
    }
}
