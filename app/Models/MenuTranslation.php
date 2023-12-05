<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $table = 'menus_translations';
    protected $fillable = ['title','text'];
}
