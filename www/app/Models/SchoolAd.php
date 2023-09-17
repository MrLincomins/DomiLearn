<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAd extends Model
{
    use HasFactory;
    protected $table = 'schoolads';

    protected $fillable = ['schoolId', 'ad', 'fileName'];
}
