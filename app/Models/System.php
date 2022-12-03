<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model 
{
    protected $table = 'systems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'url', 'icon', 'description',
    ];
}