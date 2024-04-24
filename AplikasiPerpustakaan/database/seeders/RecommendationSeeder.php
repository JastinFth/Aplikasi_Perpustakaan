<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recommendation;


class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = ([
            ([
                "yes_no"=>"yes",
            ]),
            ([
                "yes_no"=>"no",
            ]),
        ]);

        Recommendation::insert($data);
    }
}
