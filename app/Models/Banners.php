<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;

    protected $table = 'banners';
    protected $fillable = [
        'title',
        'caption',
        'image',
        'button_name',
        'link',
        'visibility',
        'status',
        'created_at',
        'updated_at',
    ];
}
