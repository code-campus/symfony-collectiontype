<?php

namespace App\Controller;

use App\Entity\Books;
use App\Repository\BooksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/book", name="books")
 */
class BooksController extends AbstractController
{
    /**
     * @Route("s", name=":index", methods={"HEAD","GET"})
     */
    public function index(BooksRepository $booksRepository): Response
    {
        return $this->render('books/index.html.twig', [
            'books' => $booksRepository->findAll(),
        ]);
    }

    /**
     * @Route("", name=":create", methods={"HEAD","GET","POST"})
     */
    public function create(Request $request): Response
    {
        $book = new Books;
        $form = $this->createForm(XXXXXXX::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        }

        return $this->render('books/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name=":read", methods={"HEAD","GET"})
     */
    public function read(Books $book): Response
    {
        return $this->render('books/read.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update", methods={"HEAD","GET","POST"})
     */
    public function update(Books $book, Request $request): Response
    {
        $form = $this->createForm(XXXXXXX::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        }

        return $this->render('books/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     */
    public function delete(): Response
    {
        return $this->render('books/delete.html.twig', [
        ]);
    }
}
