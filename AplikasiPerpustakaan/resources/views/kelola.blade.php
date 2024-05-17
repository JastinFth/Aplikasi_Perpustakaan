@extends('template')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Kelola Buku</h5>
                <hr>
                <form action="{{ url('kelola') }}" method="GET" class="mb-4 d-flex">
                  <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="q" class="form-control" placeholder="Cari buku..." value="{{ request()->q }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    @if(request()->has('q'))
                      <a href="{{ url('kelola') }}" class="btn btn-danger">Batal</a>
                    @endif
                  </div>
                </form>
                @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
                @endif
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No.</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ISBN</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Foto</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kategori</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Penulis</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Penerbit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rak Buku</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rekomenasi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Stok</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; ?>
                      @foreach($books as $book)
                      <?php $no++; ?>
                      <tr>
                      <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $no }}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$book->isbn}}</h6>                        
                        </td>
                        <td class="border-bottom-0">
                        <?php
                        $picture="no_book.jpg";
                        if ($book->picture != NUll){
                            $picture =$book->picture;
                        }
                        ?>
                        <img src="{{ url('pictures/'.$picture) }}" alt="photo" width="50">
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <h6 class="fw-semibold mb-0 fs-4">{{$book->name}}</h6>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->category->name}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->author}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->publisher}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->bookshelf->bookshelf}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->recommendation->yes_no}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">{{$book->stock}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">
                            <a href="{{ url('data/'.$book->id.'/hapus') }}" onclick="return confirm('Yakin Hapus {{ $book->name }}?')" class="btn btn-danger m-1"><i class="fi fi-rs-trash"></i></a>
                            <a href="{{ url('kelola/'.$book->id.'/edit') }}" class="btn btn-primary m-1"><i class="fi fi-rr-edit"></i></a>
                          </h6>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
@endsection