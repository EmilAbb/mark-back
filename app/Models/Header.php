<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model implements  TranslatableContract
{
    use Translatable ,HasFactory;

    public $translationModel = HeaderTranslation::class;
    protected $table = 'header';
    protected $guarded = [];
    public $timestamps = false;


    public  $translatedAttributes = ['header_name','header_name_text', 'header_title','header_phone_title'];
}
