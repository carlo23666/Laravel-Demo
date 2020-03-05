<?php

namespace App;

// php artisan make:model Post

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    // protected $primaryKey = 'dni';  para crear tu propia id

    protected $fillable = [ // Solo aceptará datos dentro de esta variable
        'title',
        'body',
    ];

    protected $guarded = [  // No aceptará datos dentro de esta variable
        'deleted',
    ];

}
