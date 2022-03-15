<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
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
        // \App\Models\User::factory(10)->create();
        $categories = [
            ['name'=>'Motori' , 'icon'=>'fa-solid fa-car'],
            ['name'=>'Videogiochi' , 'icon'=>'fa-solid fa-gamepad'],
            ['name'=>'Abbigliamento' , 'icon'=>'fa-solid fa-shirt'], 
            ['name'=>'Libri' , 'icon'=>'fa-solid fa-book-open'], 
            ['name'=>'Arredamento' , 'icon'=>'fa-solid fa-shop'], 
            ['name'=>'Elettronica', 'icon'=>'fa-solid fa-bolt'], 
            ['name'=>'Sport' , 'icon'=>'fa-solid fa-volleyball'], 
            ['name'=>'Musica' , 'icon'=>'fa-solid fa-music'], 
            ['name'=>'Giardinaggio', 'icon'=>'fa-solid fa-leaf'],
            ['name'=>'Altro' , 'icon'=>'fa-solid fa-hand-point-right'],  
            ];

            foreach ($categories as $category) {
                DB::table('categories')->insert([
                    'name'=>$category['name'],
                    'icon'=>$category['icon'],
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
            }
    }
}