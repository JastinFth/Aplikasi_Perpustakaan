<?php

namespace App\Http\Controllers;
use App\models\Book;
use App\Models\Bookshelf;
use App\Models\Category;
use App\Models\Recommendation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function home(){
        
        $yesData = Book::where('recommendation_id',1)->inRandomOrder()->limit(6)->get();

        return view("home",compact('yesData'));
    }
    public function tambah_buku(){

        $categories = Category::get();
        $bookshelfs = Bookshelf::get();


        $data = ([
            "categories"=>$categories,
            "bookshelfs"=>$bookshelfs,
        ]);
        return view("tambah_buku",$data);
    }
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function kelola(){
        $books = Book::get();
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

    public function dashboard(Request $request){
        $books = Book::get();
        $recomendations = Recommendation::get();
        $categories = Category::get();
        $bookshelfs = Bookshelf::get();

        $data = ([
            'books' => $books,
            'recommendations' => $recomendations,
            'categories' => $categories,
            'bookshelfs' => $bookshelfs,

        ]);

        return view("dashboard",$data) ;
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
        return redirect("dashboard");
    }
    public function proses_hapus_buku($id){
        Book::where("id",$id)->delete();
        return redirect("kelola");
    }
    public function edit_buku($id){
        $books = Book::where("id",$id)->first();

        if(!$books){
            abort(404);
        }

        $books = Book::get();
        $recomendations = Recommendation::get();
        $categories = Category::get();
        $bookshelfs = Bookshelf::get();

        $data = ([
            'books' => $books,
            'recommendations' => $recomendations,
            'categories' => $categories,
            'bookshelfs' => $bookshelfs,

        ]);

        return view("edit_buku",$data);
    }
    public function proses_edit_buku(Request $request){
        $books = Book::find($request->id);
        $isbn = $request->isbn;

        $books->isbn = $isbn;
        $books->category_id = $request->category;
        $books->recommendation_id = $request->recommendation;
        $books->bookshelf_id = $request->bookshelf;
        $books->name = $request->name;
        $books->author = $request->author;
        $books->publisher = $request->publisher;
        $books->stock = $request->stock;
        $books->stock = $request->stock;

    //    if($request->hasFile("picture")){
    //         $picture = $request->file("picture");
    //         $pictureName = $isbn.".".Str::random(25).".".$picture->getClientOriginalExtension();
    //         $picture->move("./pictures/",$pictureName);

    //         $books->picture = $pictureName;
    //     }

        $books->save();

        session()->flash('message', 'Data berhasil disimpan');

        return redirect("data/".$request->id."/edit");
    }
}  


