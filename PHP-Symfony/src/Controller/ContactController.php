<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts")
     */
    public function list(): Response
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Contact::class);

        $contactsList = $repository->findBy([], [], 100);

        return $this->render('contact/list.html.twig', [
            'contacts' => $contactsList,
        ]);
    }

    /**
     * @Route("/contacts/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function details($id): Response
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Contact::class);

        $contact = $repository->find($id);

        return $this->render('contact/details.html.twig', [
            'contact' => $contact,
        ]);
    }
}
