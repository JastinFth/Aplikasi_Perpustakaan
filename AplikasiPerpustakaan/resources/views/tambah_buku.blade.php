@extends('template')
@section('title')
Tambah Buku
@endsection
@section('content')

    <h1>Tambah Buku</h1>
    <hr>
    <div class="card">
        <div class="card card-body p-3 ">
            <form action="{{ url('proses-tambah-buku') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nip" class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn">
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="label-form">Foto</label>
                    <input type="file" class="form-control" name="picture" required>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Kategori</label>
                    <select class="form-select" name="category">
                        @foreach($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Penulis</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="
                    publisher" class="form-label">Penerbit </label>
                    <input type="text" name="publisher" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Rak Buku</label>
                    <select class="form-select" name="bookshelf">
                        @foreach($bookshelfs as $row)
                            <option value="{{ $row->id }}">{{ $row->bookshelf }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Stok Buku</label>
                    <input type="number" name="stock" class="form-control">
                </div> 
                <div class="mb-3">
                    <label for="" class="form-label">Rekomendasi</label>
                    <div class="form-check">
                        <label for="">
                            <input name="recommendation" type="radio" class="form-check-input" value="1">
                            Iya
                        </label>
                    </div>
                </div>
                    <div class="form-check">
                        <label for="">
                            <input name="recommendation" type="radio" class="form-check-input" value="2">
                            Tidak
                        </label>
                    </div>
    
                 <br>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection