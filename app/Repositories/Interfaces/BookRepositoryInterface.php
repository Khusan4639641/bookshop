<?php
namespace App\Repositories\Interfaces;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface
{
    public function create(array $data): Book;
    public function attachAuthors(Book $book, array $authorIds): void;
}
