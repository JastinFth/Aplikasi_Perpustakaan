<?php

namespace App\Http\Controllers;
use App\models\Book;
use App\Models\Bookshelf;
use App\Models\Category;
use App\Models\Recommendation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PDF;

class AppController extends Controller
{
    public function home(Request $request)
    {
        $yesData = Book::where('recommendation_id',1)->inRandomOrder()->limit(5)->get();
        $books = Book::all();
        $bookshelfs = Bookshelf::all();

        $data = ([
            'books' => $books,
            'bookshelfs' => $bookshelfs,
            'yesData' => $yesData,
        ]);

        return view("home",$data);
    }
    public function tambah_buku()
    {

        $categories = Category::get();
        $bookshelfs = Bookshelf::get();


        $data = ([
            "categories"=>$categories,
            "bookshelfs"=>$bookshelfs,
        ]);
        return view("tambah_buku",$data);
    }
    // public function login(){
    //     return view("login");
    // }
    public function register(){
        return view("register");
    }
    public function kelola(Request $request){
        $q = $request->input('q');

        if ($q) {
            $books = Book::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('isbn', 'LIKE', '%' . $q . '%')
                ->orWhere('author', 'LIKE', '%' . $q . '%')
                ->orWhere('publisher', 'LIKE', '%' . $q . '%')
                ->get();
        } else {
            $books = Book::get();
        }
        $recomendations = Recommendation::get();
        $categories = Category::get();
        $bookshelfs = Bookshelf::get();

        $data = ([
            'books' => $books,
            'recommendations' => $recomendations,
            'categories' => $categories,
            'bookshelfs' => $bookshelfs,

        ]);
        return view("kelola",$data);
    }

    public function dashboard(Request $request)
    {
    $q = $request->input('q');

    if ($q) {
        $books = Book::where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('isbn', 'LIKE', '%' . $q . '%')
            ->orWhere('author', 'LIKE', '%' . $q . '%')
            ->orWhere('publisher', 'LIKE', '%' . $q . '%')
            ->get();
    } else {
        $books = Book::get();
    }

    $recommendations = Recommendation::get();
    $categories = Category::get();
    $bookshelfs = Bookshelf::get();

    $data = [
        'books' => $books,
        'recommendations' => $recommendations,
        'categories' => $categories,
        'bookshelfs' => $bookshelfs,
    ];

    return view('dashboard', $data);
    }

    public function proses_tambah_buku(Request $request){
        $isbn = $request->isbn;

        $picture = $request->file("picture");
        $pictureName = $isbn."_".Str::random(25).".".
        $picture->getClientOriginalExtension();
        $picture->move("./pictures/",$pictureName);

        Book::create([
            "picture" => $pictureName,
            "isbn" => $isbn,
            "name" => $request->name,
            "category_id" => $request->category,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "bookshelf_id" => $request->bookshelf,
            "stock" => $request->stock,
            "recommendation_id" => $request->recommendation,
        ]);

        session()->flash('message', 'Data berhasil ditambah');
        return redirect("dashboard");
    }
    public function proses_hapus_buku($id)
    {
        Book::where("id",$id)->delete();
        session()->flash('message', 'Data berhasil dihapus');
        return redirect("kelola");
    }
    public function edit_buku($id)
{
    $book = Book::find($id);

    if (!$book) {
        abort(404, 'Book not found');
    }

    $recommendations = Recommendation::get();
    $categories = Category::get();
    $bookshelfs = Bookshelf::get();

    return view("edit_buku", compact('book', 'recommendations', 'categories', 'bookshelfs'));
}

public function proses_edit_buku(Request $request)
{
    $book = Book::find($request->id);

    if (!$book) {
        abort(404, 'Book not found');
    }

    $book->isbn = $request->isbn;
    $book->category_id = $request->category;
    $book->recommendation_id = $request->recommendation;
    $book->bookshelf_id = $request->bookshelf;
    $book->name = $request->name;
    $book->author = $request->author;
    $book->publisher = $request->publisher;
    $book->stock = $request->stock;

    if ($request->hasFile("picture")) {
        $picture = $request->file("picture");
        $pictureName = $request->isbn . "." . Str::random(25) . "." . $picture->getClientOriginalExtension();
        $picture->move(public_path("pictures/"), $pictureName);

        $book->picture = $pictureName;
    }

    $book->save();

    session()->flash('edit', 'Data berhasil diedit');

    return redirect("kelola/{$book->id}/edit");
}



    public function pencarian(Request $request)
    {
        $q = $request->input('q');
        $books = Book::when($q, function ($queryBuilder) use ($q) {
            return $queryBuilder->where('name', 'like', "%{$q}%");
        })->get();

        return view('hasil_buku', compact('books', 'q'));
    }

  
    public function laporan()
    {
        $books = Book::with(['recommendation','category','bookshelf'])->get();  
         return view('laporan', compact('books'));
         


    }

    public function rekomendasi()
    {
        $yesData = Book::where('recommendation_id',1)->get();
        return view('hasil_buku_rekomendasi',compact('yesData'));
    }
    public function downloadPDF()
    {
        $books = Book::with(['recommendation','category','bookshelf'])->get();
        $pdf = PDF::loadView('pdf.laporan',compact('books'));
        return $pdf->download('laporan_buku.pdf');
    }
    

}

