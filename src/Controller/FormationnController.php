<?php

namespace App\Controller;

use App\Entity\Formationn;
use App\Form\FormationnType;
use App\Repository\FormationnRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/formationn")
 */
class FormationnController extends AbstractController
{
    /**
     * @Route("/", name="formationn_index", methods={"GET"})
     */
    public function index(FormationnRepository $formationnRepository): Response
    {
        return $this->render('formationn/index.html.twig', [
            'formationns' => $formationnRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="formationn_new", methods={"GET","POST"})
    * @IsGranted("ROLE_USER")

     */
    public function new(Request $request): Response
    {
        $formationn = new Formationn();
        $form = $this->createForm(FormationnType::class, $formationn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formationn);
            $entityManager->flush();

            return $this->redirectToRoute('formationn_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formationn/new.html.twig', [
            'formationn' => $formationn,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="formationn_show", methods={"GET"})
     */
    public function show(Formationn $formationn): Response
    {
        return $this->render('formationn/show.html.twig', [
            'formationn' => $formationn,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="formationn_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Formationn $formationn): Response
    {
        $form = $this->createForm(FormationnType::class, $formationn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formationn_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formationn/edit.html.twig', [
            'formationn' => $formationn,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="formationn_delete", methods={"POST"})
     */
    public function delete(Request $request, Formationn $formationn): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formationn->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formationn);
            $entityManager->flush();
        }

        return $this->redirectToRoute('formationn_index', [], Response::HTTP_SEE_OTHER);
    }
}
