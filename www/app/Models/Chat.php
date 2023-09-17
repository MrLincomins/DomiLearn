<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['idUser1', 'idUser2', 'message', 'idSchool'];

    use HasFactory;
}
