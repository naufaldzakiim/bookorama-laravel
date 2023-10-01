<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "categoryid" => 1,
                "name" => "Science Fiction"
            ],
            [
                "categoryid" => 2,
                "name" => "Fantasy"
            ],
            [
                "categoryid" => 3,
                "name" => "History"
            ],
            [
                "categoryid" => 4,
                "name" => "Technology"
            ],
            [
                "categoryid" => 5,
                "name" => "Psychology"
            ]
        ];
        DB::table("categories")->upsert($data, ["categoryid"], ["name"]);
    }
}
