<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
protected $table ='contact_message';

    protected $fillable = ['name','email','phone','message'];
}
