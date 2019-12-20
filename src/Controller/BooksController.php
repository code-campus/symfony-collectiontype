<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/book", name="books")
 */
class BooksController extends AbstractController
{
    /**
     * @Route("s", name=":index")
     */
    public function index()
    {
        return $this->render('books/index.html.twig', [
        ]);
    }

    /**
     * @Route("", name=":create")
     */
    public function create()
    {
        return $this->render('books/create.html.twig', [
        ]);
    }

    /**
     * @Route("/{id}", name=":read")
     */
    public function read()
    {
        return $this->render('books/read.html.twig', [
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update")
     */
    public function update()
    {
        return $this->render('books/update.html.twig', [
        ]);
    }
    
    /**
     * @Route("/{id}/delete", name=":delete")
     */
    public function delete()
    {
        return $this->render('books/delete.html.twig', [
        ]);
    }
}
