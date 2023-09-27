<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departments")->insert([
            ["name" => "Admin"],
            ["name" => "Dev"],
            ["name" => "Editer"],
            ["name" => "Sale"],
            ["name" => "Marketing"]
        ]);
    }
}
