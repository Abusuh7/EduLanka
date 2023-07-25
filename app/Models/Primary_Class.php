<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_Class extends Model
{
    use HasFactory;

    protected $table = 'primary_classes';
    protected $fillable = [
        "class_name",
    ];
}
