<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Form\ColisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/colis")
 */
class ColisController extends AbstractController
{
    /**
     * @Route("/", name="colis_index", methods={"GET"})
     */
    public function index(): Response
    {
        $colis = $this->getDoctrine()
            ->getRepository(Colis::class)
            ->findAll();

        return $this->render('colis/index.html.twig', [
            'colis' => $colis,
        ]);
    }

    /**
     * @Route("/new", name="colis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coli = new Colis();
        $form = $this->createForm(ColisType::class, $coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coli);
            $entityManager->flush();

            return $this->redirectToRoute('colis_index');
        }

        return $this->render('colis/new.html.twig', [
            'coli' => $coli,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{numero}", name="colis_show", methods={"GET"})
     */
    public function show(Colis $coli): Response
    {
        return $this->render('colis/show.html.twig', [
            'coli' => $coli,
        ]);
    }

    /**
     * @Route("/{numero}/edit", name="colis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Colis $coli): Response
    {
        $form = $this->createForm(ColisType::class, $coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('colis_index', [
                'numero' => $coli->getNumero(),
            ]);
        }

        return $this->render('colis/edit.html.twig', [
            'coli' => $coli,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{numero}", name="colis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Colis $coli): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coli->getNumero(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coli);
            $entityManager->flush();
        }

        return $this->redirectToRoute('colis_index');
    }
}
