<?php

namespace App\Controller;

use App\Entity\PlanFormation;
use App\Form\PlanFormationType;
use App\Repository\PlanFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plan/formation")
 */
class PlanFormationController extends AbstractController
{
    /**
     * @Route("/", name="plan_formation_index", methods={"GET"})
     */
    public function index(PlanFormationRepository $planFormationRepository): Response
    {
        return $this->render('plan_formation/index.html.twig', [
            'plan_formations' => $planFormationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="plan_formation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $planFormation = new PlanFormation();
        $form = $this->createForm(PlanFormationType::class, $planFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planFormation);
            $entityManager->flush();

            return $this->redirectToRoute('plan_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plan_formation/new.html.twig', [
            'plan_formation' => $planFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="plan_formation_show", methods={"GET"})
     */
    public function show(PlanFormation $planFormation): Response
    {
        return $this->render('plan_formation/show.html.twig', [
            'plan_formation' => $planFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="plan_formation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PlanFormation $planFormation): Response
    {
        $form = $this->createForm(PlanFormationType::class, $planFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plan_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plan_formation/edit.html.twig', [
            'plan_formation' => $planFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="plan_formation_delete", methods={"POST"})
     */
    public function delete(Request $request, PlanFormation $planFormation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planFormation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planFormation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plan_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
