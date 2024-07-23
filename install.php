<?php

use App\Services\{CategoryService, BookService, AuthorService};

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$categoryService = $app->make(CategoryService::class);
$bookService = $app->make(BookService::class);
$authorService = $app->make(AuthorService::class);

$categories = [
    'Фантастика',
    'Детективы',
    'Романы'
];

foreach ($categories as $categoryName) {
    $category = $categoryService->createCategory(['name' => $categoryName]);

    for ($i = 1; $i <= 10; $i++) {
        $book = $bookService->createBook([
            'name' => "{$categoryName} книга {$i}",
            'price' => rand(100, 1000),
            'category_id' => $category->id,
            'status' => 'In Stock'
        ]);

        $author = $authorService->createAuthor("Автор {$i}");
        $bookService->attachAuthors($book, [$author->id]);
    }
}

echo "Test data loaded successfully.";
