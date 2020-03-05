<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Title 1', 
            'body' => 'Content of the post #1',  
        ]);       
        
		DB::table('users')->insert([
			'name' => 'Carlo',
			'email' => 'user@dominio.com',
			'password' => bcrypt('password'),
		]);
    }
}

// php artisan make:seeder PostsTableSeeder

// php artisan db:seed