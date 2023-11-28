<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalTranslation extends Model
{
 protected $table = 'legal_translations';
 protected $fillable = ['title'];
}
