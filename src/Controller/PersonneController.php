<?php

namespace App\Controller;

use App\Entity\Personne;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\PersonneService;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function index(): Response
    {



        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
        ]);
    }

    /**
     * @Route("/personne-register", name="personne_register")
     */
    public function createPersonne(Request $request, ValidatorInterface $validator, PersonneService $personneService) : Response
     {
        $PersonneService->persistPersonne($request, $validator, $personneService);
        
        return $this->render('personne/new.html.twig',[
            'personne_check' => 'Nouvelle personne bien enregistrée'
        ]);
        //return new Response('Saved new Personne Personne with id '.$Personne->getId());
        
     }
}
