<?php
namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Book
    {
        return $this->model->create($data);
    }

    public function attachAuthors(Book $book, array $authorIds): void
    {
        $book->authors()->attach($authorIds);
    }
}
