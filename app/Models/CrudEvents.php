<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CrudEvents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_name',
        'event_start',
        'event_end'
    ];
}
