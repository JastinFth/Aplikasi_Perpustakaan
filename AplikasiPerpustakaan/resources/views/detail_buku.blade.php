<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="p-3 border-bottom">
        <div class="container ">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="/" class="d-flex align-items-center mb-2 mb-md-0 text-decoration-none">
                    <h3>IryadPedia</h3>
                </a>

                <form class="ms-auto pe-0" role="search" action="{{ route('pencarian') }}" method="GET">
                    <input type="search" class="form-control" name="q" placeholder="Search..." aria-label="Search">
                </form>

            </div>
        </div>
    </header>

    <div class="container py-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/pencarian') }}">Buku</a></li>
                @if($book->slug)
                    <li class="breadcrumb-item active">{{ $book->slug }}</li>
                @endif
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <?php
                $picture="no_book.jpg";
                if ($book->picture != NUll)
                {
                    $picture =$book->picture;
                }
                ?>
                <img src="{{ url('pictures/'.$picture) }}" class="img-thumbnail rounded shadow" alt="photo buku" width="70%" height="500">
            </div>
            <div class="col">
                <h2 style="color: #808080;">{{ $book->author }}</h2>
                <h1 class="fs-1">{{ $book->name }}</h1>
                <br>
                <h6>Deskripsi Buku</h6>
                <p>{{ $book->description }}</p>
                <br>
                <div class="row">
                    <h6>Detail Buku</h6>
                    <div class="col">
                        <p>kategori : {{ $book->category->name }}</p>
                        <p>ISBN : {{ $book->isbn }}</p>
                    </div>
                    <div class="col">
                        <p>Penerbit : {{ $book->publisher }}</p>
                        <p>Rak Buku : {{ $book->bookshelf->bookshelf }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
