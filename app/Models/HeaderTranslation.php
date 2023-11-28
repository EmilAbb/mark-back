<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTranslation extends Model
{
    protected $table = 'header_translations';
    protected $guarded = [];
    public $timestamps = false;

    protected $fillable = [
        'header_name',
        'header_name_text',
        'header_title',
        'header_phone_title',
    ];
}
