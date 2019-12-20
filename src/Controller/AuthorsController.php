<?php

namespace App\Controller;

use App\Entity\Authors;
use App\Form\AuthorType;
use App\Repository\AuthorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/author", name="authors")
 */
class AuthorsController extends AbstractController
{
    /**
     * @Route("s", name=":index", methods={"HEAD","GET"})
     */
    public function index(AuthorsRepository $authorsRepository): Response
    {
        return $this->render('authors/index.html.twig', [
            'authors' => $authorsRepository->findAll(),
        ]);
    }

    /**
     * @Route("", name=":create", methods={"HEAD","GET","POST"})
     */
    public function create(Request $request): Response
    {
        $author = new Authors;
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
        }

        return $this->render('authors/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name=":read", methods={"HEAD","GET"})
     */
    public function read(Authors $author): Response
    {
        return $this->render('authors/read.html.twig', [
            'author' => $author,
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update", methods={"HEAD","GET","POST"})
     */
    public function update(Authors $author, Request $request): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
        }

        return $this->render('authors/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     */
    public function delete(): Response
    {
        return $this->render('authors/delete.html.twig', [
        ]);
    }
}
