<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('menus')->insert([
            [
                'name' => 'adobo',
                'photo' => 'menus/adobo.jpg',
                'price' => 120,
                'stocks' => 12,
                'available' => true
            ],

            [
                'name' => 'beef camto',
                'photo' => 'menus/beef_camto.jpg',
                'price' => 240,
                'stocks' => 15,
                'available' => true
            ],

            [
                'name' => 'boodle fight',
                'photo' => 'menus/boodle_fight.jpg',
                'price' => 200,
                'stocks' => 20,
                'available' => true
            ],

            [
                'name' => 'crispy pata',
                'photo' => 'menus/crispy_pata.jpg',
                'price' => 250,
                'stocks' => 19,
                'available' => true
            ],

            [
                'name' => 'embutido',
                'photo' => 'menus/embutido.jpg',
                'price' => 150,
                'stocks' => 12,
                'available' => true
            ],
        ]);
    }
}
