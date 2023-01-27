<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spos_users')->upsert([
            ["user_id" => "1","username" => "admin","password" => '$2y$10$za0gGIfTaD5dpNoabDvX9.5yQeYQlSj4Xm4UiyyWQRQuGoFLH40rW'],
            ["user_id" => "2","username" => "user 1","password" => '$2y$10$za0gGIfTaD5dpNoabDvX9.5yQeYQlSj4Xm4UiyyWQRQuGoFLH40rW'],
            ["user_id" => "3","username" => "user 2","password" => '$2y$10$za0gGIfTaD5dpNoabDvX9.5yQeYQlSj4Xm4UiyyWQRQuGoFLH40rW'],
            ["user_id" => "4","username" => "user 3","password" => '$2y$10$za0gGIfTaD5dpNoabDvX9.5yQeYQlSj4Xm4UiyyWQRQuGoFLH40rW'],
            ["user_id" => "5","username" => "user 4","password" => '$2y$10$za0gGIfTaD5dpNoabDvX9.5yQeYQlSj4Xm4UiyyWQRQuGoFLH40rW'],
        ], "user_id");

        DB::table('spos_category')->upsert([
            ["category_id" => "1","category_name" => "Category 1"],
            ["category_id" => "2","category_name" => "Category 2"],
            ["category_id" => "3","category_name" => "Category 3"],
            ["category_id" => "4","category_name" => "Category 4"],
            ["category_id" => "5","category_name" => "Category 5"],
        ], "category_id");
        
    }
}
