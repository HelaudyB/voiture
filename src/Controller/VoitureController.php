<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index()
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }


    /**
     * @Route("/add_voiture", name="add_voiture")
     */

    public function addVoiture(Request $request)
    {
        $form = $this->createForm(VoitureType::class, new Voiture());
        // Ici nous traitons notre requête
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $voiture = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
        } else {
            return $this->render('voiture/addvoiture.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors()

            ]);
        }
    }
}
