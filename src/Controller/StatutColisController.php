<?php

namespace App\Controller;

use App\Entity\StatutColis;
use App\Form\StatutColisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statut/colis")
 */
class StatutColisController extends AbstractController
{
    /**
     * @Route("/", name="statut_colis_index", methods={"GET"})
     */
    public function index(): Response
    {
        $statutColis = $this->getDoctrine()
            ->getRepository(StatutColis::class)
            ->findAll();

        return $this->render('statut_colis/index.html.twig', [
            'statut_colis' => $statutColis,
        ]);
    }

    /**
     * @Route("/new", name="statut_colis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $statutColi = new StatutColis();
        $form = $this->createForm(StatutColisType::class, $statutColi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($statutColi);
            $entityManager->flush();

            return $this->redirectToRoute('statut_colis_index');
        }

        return $this->render('statut_colis/new.html.twig', [
            'statut_coli' => $statutColi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statut_colis_show", methods={"GET"})
     */
    public function show(StatutColis $statutColi): Response
    {
        return $this->render('statut_colis/show.html.twig', [
            'statut_coli' => $statutColi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="statut_colis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StatutColis $statutColi): Response
    {
        $form = $this->createForm(StatutColisType::class, $statutColi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('statut_colis_index', [
                'id' => $statutColi->getId(),
            ]);
        }

        return $this->render('statut_colis/edit.html.twig', [
            'statut_coli' => $statutColi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statut_colis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StatutColis $statutColi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutColi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($statutColi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('statut_colis_index');
    }
}
