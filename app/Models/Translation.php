<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected  $table = 'translations';
    protected  $guarded = [];
    public $translationModel = TranslationTransaltion::class;
    public $translatedAttributes = ['title'];
    public $timestamps = false;

}
