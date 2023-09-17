<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAndWish extends Model
{
    use HasFactory;

    protected $table = 'requestsandwishes';

    protected $fillable = ['userId', 'wishes'];
}
