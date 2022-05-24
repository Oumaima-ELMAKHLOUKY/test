<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/', name: 'home')]

    public function home(): Response
    {
        return $this->render('project/home.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/recensement', name: 'recensement')]

    public function recensement(): Response
    {
        return $this->render('project/recensement.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request): Response
    {
        $form =$this->createForm(ContactType :: class);
        $form->handleRequest($request);
        if($form->issSubmitted() && $form->isValid()){
            $contact = $form->getData();
            dd($contact);
        }
        return $this->render('project/contact.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

}
