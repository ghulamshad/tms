<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory; // Enables factory-based seeding

    protected $fillable = ['key', 'value', 'locale', 'tags'];

    /**
     * Cast attributes to native types.
     */
    protected $casts = [
        'tags' => 'array', // If you plan to store tags as JSON in DB
    ];
}
