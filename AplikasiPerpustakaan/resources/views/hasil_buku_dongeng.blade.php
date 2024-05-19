@extends('template_hasil_buku')

@section('search')
    <form class="d-none d-md-flex ms-4 pembesar" method="GET" action="{{ route('pencarian') }}">
        <input class="form-control border-0" type="search" name="q"  placeholder="Search">
    </form>
@endsection

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-2 g-lg-3 row-col-2 row-cols-md-3 row-cols-xl-5 ">
            @foreach($dongengData as $book)
                <div class="col ">
                    <a href="{{ route('book.detail',$book->slug) }}" class="card d-flex flex-column h-100" style="width: 12rem; display: flex; flex-direction: column;">
                            <?php
                            $picture="no_book.jpg";
                            if ($book->picture != NUll)
                            {
                                $picture =$book->picture;
                            }
                            ?>
                        <img src="{{ url('pictures/'.$picture) }}" alt="photo buku" width="100%" height="220">
                        <div class="card-body flex-grow-1">
                            <p class="card-text book-title flex-grow-1" style="color: black;">{{ $book->name }}</p>
                            <p class="card-text" style="color: #808080;">{{ $book->author }}</p>
                            <p class="card-text " style="color: black;">Rak buku : {{$book->bookshelf->bookshelf}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
