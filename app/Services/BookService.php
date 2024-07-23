<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function createBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    public function attachAuthors(Book $book, array $authorIds): void
    {
        $this->bookRepository->attachAuthors($book, $authorIds);
    }
}
