<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        DB::table('posts')->insert([
            'body' => 'this is my first post that exist ',
            'user_id' =>1,
            'created_at' => now()
            // Add more data as needed
        ]);
    }
}
