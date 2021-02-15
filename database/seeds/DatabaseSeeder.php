<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => "admin",
                'email' => "admin@email.com",
                'phone' => "082181189178",
                'role' => "admin",
                'password' => bcrypt('admin')
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => "Beach",
            ],
            [
                'name' => 'Mountain',
            ]
        ]);

        DB::table('articles')->insert([
            [
                'user_id' => 4,
                'categories_id' => 1,
                'title' => 'Pantai Kuta Bali',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellat',
                'image' => 'b1.jpeg',
            ],
            [
                'user_id' => 4,
                'categories_id' => 1,
                'title' => 'Pantai',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellat',
                'image' => 'b2.jpeg',
            ]
        ]);


        // $this->call(UserSeeder::class);
    }
}
