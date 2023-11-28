<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements  TranslatableContract
{
    use Translatable ,HasFactory;

    public $translationModel = NewsTranslation::class;
    protected $table = 'news';
    protected $guarded = [];
    public $timestamps = false;


    public  $translatedAttributes = ['date','title', 'text'];
}
