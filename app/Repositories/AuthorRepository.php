<?php
namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    protected $model;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Author
    {
        return $this->model->create($data);
    }
}
