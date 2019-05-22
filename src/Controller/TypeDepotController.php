<?php

namespace App\Controller;

use App\Entity\TypeDepot;
use App\Form\TypeDepotType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/depot")
 */
class TypeDepotController extends AbstractController
{
    /**
     * @Route("/", name="type_depot_index", methods={"GET"})
     */
    public function index(): Response
    {
        $typeDepots = $this->getDoctrine()
            ->getRepository(TypeDepot::class)
            ->findAll();

        return $this->render('type_depot/index.html.twig', [
            'type_depots' => $typeDepots,
        ]);
    }

    /**
     * @Route("/new", name="type_depot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeDepot = new TypeDepot();
        $form = $this->createForm(TypeDepotType::class, $typeDepot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeDepot);
            $entityManager->flush();

            return $this->redirectToRoute('type_depot_index');
        }

        return $this->render('type_depot/new.html.twig', [
            'type_depot' => $typeDepot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_depot_show", methods={"GET"})
     */
    public function show(TypeDepot $typeDepot): Response
    {
        return $this->render('type_depot/show.html.twig', [
            'type_depot' => $typeDepot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_depot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeDepot $typeDepot): Response
    {
        $form = $this->createForm(TypeDepotType::class, $typeDepot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_depot_index', [
                'id' => $typeDepot->getId(),
            ]);
        }

        return $this->render('type_depot/edit.html.twig', [
            'type_depot' => $typeDepot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_depot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeDepot $typeDepot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDepot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeDepot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_depot_index');
    }
}
