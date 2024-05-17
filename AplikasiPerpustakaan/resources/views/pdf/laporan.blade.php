<!DOCTYPE html>
<html>
<head>
    <title>Laporan Buku</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Laporan Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Rekomendasi</th>
                <th>Kategori</th>
                <th>Rak Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->name }}</td>
                <td >
                    <?php
                    $picture="no_book.jpg";
                    if ($book->picture != NUll){
                        $picture =$book->picture;
                    }
                    ?>
                    <img src="{{ url('pictures/'.$picture) }}" alt="photo" width="50">
                    </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->recommendation->yes_no ?? 'N/A' }}</td>
                <td>{{ $book->category->name ?? 'N/A' }}</td>
                <td>{{ $book->bookshelf->bookshelf ?? 'N/A' }}</td>
                <td>{{ $book->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>