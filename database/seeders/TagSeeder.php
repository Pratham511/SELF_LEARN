<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name'      =>   'kgf',
                'slug'      =>   'rockey',
                'created_at'=>   now(),
                'updated_at'=>   now(),
            ],
            [

                'name'      =>   'shiddat',
                'slug'      =>   'Ira',
                'created_at'=>   now(),
                'updated_at'=>   now(),
            ],
            [

                'name'      =>   'yjhd',
                'slug'      =>   'bunny',
                'created_at'=>   now(),
                'updated_at'=>   now(),
            ]
        ]);
    }
}
