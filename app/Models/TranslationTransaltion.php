<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationTransaltion extends Model
{
  protected $table = 'translations_translations';
  protected $fillable =['title'];
    public $timestamps = false;

}
