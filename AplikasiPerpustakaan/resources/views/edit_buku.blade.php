@extends('template')
@section('title')
Edit Buku
@endsection
@section('content')

<br>
<br>
<br>
<br>
@if(session()->has('message'))
    <div class="alert alert-success m-3">
        {{ session()->get('message') }}
    </div>
@endif
<div class="card">
    <div class="card card-body p-3">
        <form action="{{ url('proses-edit-buku') }}" enctype="multipart/form-data" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $book->id }}">

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $book->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="picture">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="category">
                    @foreach($categories as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $book->category_id ? 'selected' : '' }}>{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Penerbit</label>
                <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Rak Buku</label>
                <select class="form-select" name="bookshelf">
                    @foreach($bookshelfs as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $book->bookshelf_id ? 'selected' : '' }}>{{ $row->bookshelf }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok Buku</label>
                <input type="number" name="stock" class="form-control" value="{{ $book->stock }}">
            </div>
            <div class="mb-3">
                <label for="recommendation" class="form-label">Rekomendasi</label>
                <div class="form-check">
                    <input name="recommendation" type="radio" class="form-check-input" value="1" {{ $book->recommendation_id == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Iya</label>
                </div>
                <div class="form-check">
                    <input name="recommendation" type="radio" class="form-check-input" value="2" {{ $book->recommendation_id == 2 ? 'checked' : '' }}>
                    <label class="form-check-label">Tidak</label>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ url('kelola') }}" class="btn btn-sm btn-danger m-3">Kembali</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($edit = Session::get("edit"))
      <script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data berhasil diedit",
            showConfirmButton: false,
            timer: 1500
            });
      </script>

      @endif
@endsection
