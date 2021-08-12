<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HashtagSeeder extends Seeder
{
    public function run()
    {
        $name = Str::random(25);

        DB::table('posts')->insert([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
    }
}
