<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "username" => "admin",
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("123"),
            "department_id" => "1",
            "status_id" => "1"
        ]);

        DB::table("users")->insert([
            "username" => "manhduc",
            "name" => "Mạnh Đức",
            "email" => "duc@gmail.com",
            "password" => bcrypt("123"),
            "department_id" => "2",
            "status_id" => "1"
        ]);

        DB::table("users")->insert([
            "username" => "user",
            "name" => "User",
            "email" => "user@gmail.com",
            "password" => bcrypt("123"),
            "department_id" => "3",
            "status_id" => "1"
        ]);

        DB::table("users")->insert([
            "username" => "user1",
            "name" => "User1",
            "email" => "user1@gmail.com",
            "password" => bcrypt("123"),
            "department_id" => "4",
            "status_id" => "1"
        ]);
    }
}
