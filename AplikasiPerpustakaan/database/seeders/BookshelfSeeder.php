<?php

namespace Database\Seeders;

use App\Models\Bookshelf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $divisions = ([
            ([
                "bookshelf"=>"A",
            ]),
            ([
                "bookshelf"=>"B",
            ]),
            ([
                "bookshelf"=>"C",
            ]),
            ([
                "bookshelf"=>"D",
            ]),
            ([
                "bookshelf"=>"E",
            ]),
        ]);

        Bookshelf::insert($divisions);
    }
}
