<?php

namespace Novaway\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractMoviePerson extends AbstractPerson
{
    /**
     * @var Movie[]
     */
    private $movies;

    /**
     * @param Movie[] $movies
     *
     * @return AbstractMoviePerson
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }

    /**
     * @return Movie[]
     */
    public function getMovies()
    {
        return $this->movies;
    }
}