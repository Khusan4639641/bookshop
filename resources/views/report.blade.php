<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1>Bookshop Report</h1>
    <div class="accordion" id="categoryAccordion">
        @foreach($categories as $category)
            <div class="card">
                <div class="card-header" id="heading{{ $category->id }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
                            {{ $category->name }} ({{ $category->books->count() }} books, Total Price: ${{ $category->books->sum('price') }})
                        </button>
                    </h2>
                </div>

                <div id="collapse{{ $category->id }}" class="collapse" aria-labelledby="heading{{ $category->id }}" data-parent="#categoryAccordion">
                    <div class="card-body">
                        @if($category->books->isEmpty())
                            <p>No data</p>
                        @else
                            <ul>
                                @foreach($category->books as $book)
                                    <li>
                                        <strong>{{ $book->name }}</strong> - ${{ $book->price }}
                                        <ul>
                                            @foreach($book->authors as $author)
                                                <li>{{ $author->name }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
