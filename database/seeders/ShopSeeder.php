<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' =>'ここに店名が入ります。',
                'information' => 'ここに店舗情報が入ります。ここに店舗情報が入ります。ここに店舗情報が入ります。',
                'filename' => '',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' =>'ここに店名が入ります。',
                'information' => 'ここに店舗情報が入ります。ここに店舗情報が入ります。ここに店舗情報が入ります。',
                'filename' => '',
                'is_selling' => true
            ],
        ]);
    }
}
