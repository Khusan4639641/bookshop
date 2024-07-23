<?php
namespace App\Repositories\Interfaces;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

interface AuthorRepositoryInterface
{
    public function create(array $data): Author;
}
