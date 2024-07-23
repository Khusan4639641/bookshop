<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategoriesWithBooks(): Collection
    {
        return $this->categoryRepository->all();
    }

    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }
}
