<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeTranslation extends Model
{
protected $table = 'practice_translations';
protected $fillable = ['title','text'];
}
