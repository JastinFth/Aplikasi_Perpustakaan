<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = ([
            "isbn" => "12345",
            "name" => "Herry Potter dan Batu Bertuah",
            "category_id" => 1,
            "author" => "J. K. Rowling",
            "publisher" => "Bloomsbury",
            "bookshelf_id" => 1,
            "recommendation_id" => 1,
            "stock" => 15,

        ]);

        Book::insert($data);
    }
}
