<?php
namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategoriesWithBooks();

        return view('report', compact('categories'));
    }
}
