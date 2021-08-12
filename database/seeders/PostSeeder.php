<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            'name' => Str::random(25),
            'description' => Str::random(300),
            'background_link' => 'https://yandex.ru/images/search?text=%D0%97%D0%B0%D0%B2%D1%82%D1%80%D0%B0%D0%BA&nl=1&source=morda&pos=2&img_url=https%3A%2F%2Fscontent-hel3-1.cdninstagram.com%2Fv%2Ft51.2885-15%2Fe35%2F169114830_1395691104117672_5204697829151863274_n.jpg%3Ftp%3D1%26_nc_ht%3Dscontent-hel3-1.cdninstagram.com%26_nc_cat%3D100%26_nc_ohc%3DrwZSan5cT18AX8qlNxz%26edm%3DABfd0MgAAAAA%26ccb%3D7-4%26oh%3D8c2f09e044a40389bd2ac1654d295e88%26oe%3D6090C77F%26_nc_sid%3D7bff83&rpt=simage',
        ]);
    }
}
