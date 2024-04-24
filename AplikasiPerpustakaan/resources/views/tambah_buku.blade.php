<h1>Tambah Pegawai</h1>
<hr>
<div class="card">
    <div class="card card-body">
        <form action="{{ url('proses-tambah-data') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="mb-3">
                <label class="label-form">Foto</label>
                <input type="file" class="form-control" name="picture" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" name="number_id">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">
                    Nama
                </label>
                <input type="text" name="name" class="form-control">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <label for="">
                        <input name="gender" type="radio" class="form-check-input" value="L">
                        Laki Laki
                    </label>
                </div>


                <div class="form-check">
                    <label for="">
                        <input name="gender" type="radio" class="form-check-input" value="P">
                        Perempuan
                    </label>
                </div>
            </div>


            <div class="mb-3">
                <label for="" class="form-label">
                    Tempat Lahir
                </label>
                <input type="text" name="birth_place" class="form-control">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">
                    Tanggal Lahir
                </label>
                <input type="date" name="birth_date" class="form-control">
            </div>


            <div class="mb-3">
                <label for="
                alamat" class="form-label">Alamat</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
            </div>


            <div class="mb-3">
                <label  class="form-label">Bagian</label>
                <select class="form-select" name="division">
            @foreach ($divisions as $row)
                <option value="{{ $row->id }}">
                {{ $row->name }}
                </option>
            @endforeach</select>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
            </form>

    </div>
</div>
