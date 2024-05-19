<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>

        <link rel="icon" type="image/x-icon" href="{{ url('assets_front/favicon.ico') }}" />

        <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('assets_front/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ url('app.css') }}" rel="stylesheet" />
    </head>
    <body>
         <style>
            .hop:hover{
                background-color: blue;
            }
         </style>
        <div class="bgg text-white showcase-img"  >
            <nav class="navbar navbar-dark bg-dark sticky-top  opacity-75">
                <div class="container">
                    <a class="navbar-brand  nip" href="{{ url('/') }}" id="judul">IrsyadPedia</a>
                    <div class="m-2">
                        <a class="btn btn-primary m-2 p-2 opacity-75 hop"id="judul" href="{{ url('register') }}">Register</a>
                    <a class="btn btn-primary m-2 p-2 opacity-75 hop"id="judul" href="{{ url('login') }}">Login</a>
                    </div>

                </div>
            </nav>
            <header class="masthead">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <div class="text-center text-white">
                                <h1 class="mb-5">Silahkan Cari Buku Yang Anda Inginkan!</h1>
                                <form class="form-subscribe" id="frm_search" action="{{ route('pencarian') }}"  method="GET">
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control form-control-lg"  id="search" type="search" name="q" placeholder="search">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

         <div class="container my-5">
             <div class="card">
                 <div class="card-header text-center">
                     Rekomendasi
                 </div>
                 <div class="card-body">
                     <div class="row g-2 g-lg-3 row-col-2 row-cols-md-3 row-cols-xl-5 ">
                         @foreach($yesData as $book)
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
                 <div class="card-footer text-body-secondary">
                     <a href="/rekomendasi">See more</a>
                 </div>
             </div>
         </div>


        <div class="card m-1 p-1 align-items-center   shadow wrbg">
            <div class="wrapper m-2">
                <div class="card m-2 p-2 align-items-center   shadow wrbg">
                    <h2 class="m-2 ms-4 p-1"><b>RAK BUKU</b></h2>
                    <div class="wrapper m-2">
                        @foreach ($bookshelfs as $bookshelf)
                        <div class="card" width="100">
                            <div class="card-body">
                                <p>{{ $bookshelf->bookshelf }}</p>
                                <ol type="1">
                                    @foreach ($bookshelf->books as $book)
                                    <li>{{ $book->name }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer bg-light mt-5 p-4">
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; JasaHurayyy 2023. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ url('assets_front/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="{{ url('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>
    </body>
</html>
