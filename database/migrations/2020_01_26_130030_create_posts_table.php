<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// $ php artisan make:migration create_posts_table --create=posts

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Ejecuta la migracion
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255); // Asi añadimos campos a la tabla
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // Hacer un rollback
    {
        Schema::drop('posts');
    }
}

// php artisan migrate / atisan migrate:rollback / artisan migrate:reset