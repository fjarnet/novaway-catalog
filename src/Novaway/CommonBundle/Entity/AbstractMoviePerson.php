<?php

namespace Novaway\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractMoviePerson extends AbstractPerson
{
    /**
     * @var Movie[]
     * @ORM\ManyToMany(targetEntity="Novaway\CommonBundle\Entity\Movie", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="person_movie",
     *   joinColumns={@ORM\JoinColumn(name="movie_person_id", referencedColumnName="id", onDelete="CASCADE")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="movie_id", referencedColumnName="id")}
     * )

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