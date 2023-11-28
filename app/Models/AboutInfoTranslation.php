<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutInfoTranslation extends Model
{
protected $table = 'about_info_translations';
protected $fillable = ['title','text'];
}
