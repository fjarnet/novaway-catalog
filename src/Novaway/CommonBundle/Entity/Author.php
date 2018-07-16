<?php

namespace Novaway\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Author extends AbstractPerson
{
    /**
     * @var Book[]
     * @ORM\OneToMany(targetEntity="Novaway\CommonBundle\Entity\Book", mappedBy="author")
     */
    private $books;

    /**
     * @param Book[] $books
     *
     * @return Author
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * @return Book[]
     */
    public function getBooks()
    {
        return $this->books;
    }
}
