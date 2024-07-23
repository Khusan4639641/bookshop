<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function createAuthor(string $name): Author
    {
        return $this->authorRepository->create(['name' => $name]);
    }
}
