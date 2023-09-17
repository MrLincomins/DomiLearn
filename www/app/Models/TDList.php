<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDList extends Model
{
    use HasFactory;

    protected $table = 'tdlists';

    protected $fillable = ['userId', 'task', 'state'];

}
