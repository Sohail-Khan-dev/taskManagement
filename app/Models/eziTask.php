<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eziTask extends Model
{
    protected $table = 'tasks';
    use HasFactory;
    protected $fillable = ['title','description','status'];
}
