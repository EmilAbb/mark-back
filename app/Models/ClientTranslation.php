<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
protected $table = 'clients_translations';
protected $fillable = ['title','text'];
}
