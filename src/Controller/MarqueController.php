<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MarqueController extends AbstractController
{
    /**
     * @Route("/marque", name="marque")
     */
    public function index()
    {
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }
    /**
     * @Route("/add_marque", name="add_marque")
     */
    public function addMarque(Request $request)
    {
        $form = $this->createForm(MarqueType::class, new Marque());
        // Ici nous traitons notre requête
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $marque = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($marque);
            $em->flush();
        }else {
            return $this->render('marque/addmarque.html.twig', [
                'form' => $form->createView(),
                'errors'=>$form->getErrors()
            ]);

        }
    }
    
}
