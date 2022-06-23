<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizEntry extends Model
{
    use HasFactory;

    protected $fillable = ['participent', 'answers'];
}