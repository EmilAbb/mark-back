<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
 protected $table = 'contacts_translations';
 protected $fillable = ['title','text','description_one','description_two'];
}
