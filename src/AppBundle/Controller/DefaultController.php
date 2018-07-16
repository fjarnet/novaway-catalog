<?php

namespace AppBundle\Controller;

use AppBundle\Form\SearchFullTextType;
use Novaway\CommonBundle\Entity\Book;
use Novaway\CommonBundle\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $doctrine = $this->getDoctrine();
        $books = $doctrine->getRepository('NovawayCommonBundle:Book')->findBy([], [
          'createdAt' => 'DESC',
        ]);

        $paginator  = $this->get('knp_paginator');
        $booksPagination = $paginator->paginate(
          $books,
          $request->query->getInt('bookPage', 1),
          5,  [
            'pageParameterName' => 'bookPage',
          ]
        );

        $movies = $doctrine->getRepository('NovawayCommonBundle:Movie')->findBy([], [
          'createdAt' => 'DESC',
        ]);

        $paginator  = $this->get('knp_paginator');
        $moviesPagination = $paginator->paginate(
          $movies,
          $request->query->getInt('moviePage', 1),
          5,  [
            'pageParameterName' => 'moviePage',
          ]
        );

        $form = $this->get('form.factory')->create(
          SearchFullTextType::class
        );

        $form->handleRequest($request);

        $formData = $form->getData();

        if ($form->getClickedButton() && $form->isSubmitted() && $form->isValid()) {
            $requestData = $request->query->get($form->getName());

        }

        return $this->render('@App/Default/index.html.twig', [
          'movies' => $moviesPagination,
          'books' => $booksPagination,
          'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @Route("/book/{book}", name="novaway_book_show")
     *
     * @param Book $book
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showBookAction(Book $book)
    {
        return $this->render('@App/Default/book.show.html.twig', [
          'book' => $book,
        ]);
    }

    /**
     *
     * @Route("/movie/{movie}", name="novaway_movie_show")
     *
     * @param Movie $movie
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showMovieAction(Movie $movie)
    {
        return $this->render('@App/Default/movie.show.html.twig', [
          'movie' => $movie,
        ]);
    }
}
