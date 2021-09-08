<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\PersonneService;
use DateTimeInterface;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function index(): Response
    {

        return $this->render('personne/index.html.twig');
    }

    /**
     * @Route("/personne-register", name="personne_register")
     */
    public function createPersonne(Request $request, ValidatorInterface $validator, PersonneService $personneService) : Response
     {
        return $personneService->persistPersonne($request, $validator);
              
     }
}
