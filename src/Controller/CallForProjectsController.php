<?php

namespace App\Controller;

use App\Entity\CallForProjects;
use App\Entity\FilledField;
use App\Entity\Project;
use App\Form\CallForProjectsType;
use App\Form\ProjectType;
use App\Repository\CallForProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/call-for-projects")
 */
class CallForProjectsController extends AbstractController
{
    /**
     * @Route("/", name="call_for_projects_index", methods={"GET"})
     */
    public function index(CallForProjectsRepository $callForProjectsRepository): Response
    {
        return $this->render('call_for_projects/index.html.twig', [
            'call_for_projects' => $callForProjectsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="call_for_projects_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $callForProject = new CallForProjects();
        $form = $this->createForm(CallForProjectsType::class, $callForProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($callForProject);
            $entityManager->flush();

            return $this->redirectToRoute('call_for_projects_index');
        }

        return $this->render('call_for_projects/new.html.twig', [
            'call_for_project' => $callForProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="call_for_projects_show", methods={"GET"})
     * @param CallForProjects $callForProject
     * @param Request $request
     * @return Response
     */
    public function show(CallForProjects $callForProject, Request $request): Response
    {
        return $this->render('call_for_projects/show.html.twig', [
            'call_for_project' => $callForProject,
        ]);
    }

    /**
     * @Route("/{id}/add-project", name="call_for_projects_add_project", methods={"GET", "POST"})
     * @param CallForProjects $callForProject
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function addProject(CallForProjects $callForProject, Request $request, EntityManagerInterface $em)
    {
        $newProject = new Project();
        foreach ($callForProject->getFields() as $field) {
            $newFilledField = new FilledField();
            $newFilledField->setField($field);
            $newFilledField->setContent('aze');
            $newProject->addFilledField($newFilledField);
        }
        $newProject->setCallForProjects($callForProject);

        $createProjectForm = $this->createForm(ProjectType::class, $newProject);

        $createProjectForm->handleRequest($request);

        if ($createProjectForm->isSubmitted() and $createProjectForm->isValid()) {

            $em->persist($newProject);
            $em->flush();

            return $this->redirectToRoute('call_for_projects_show', ['id' => $callForProject->getId()]);
        }

        return $this->render('call_for_projects/add_project.html.twig', [
            'call_for_project' => $callForProject,
            'createProjectForm' => $createProjectForm->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="call_for_projects_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CallForProjects $callForProject): Response
    {
        $form = $this->createForm(CallForProjectsType::class, $callForProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('call_for_projects_index');
        }

        return $this->render('call_for_projects/edit.html.twig', [
            'call_for_project' => $callForProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="call_for_projects_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CallForProjects $callForProject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$callForProject->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($callForProject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('call_for_projects_index');
    }
}
