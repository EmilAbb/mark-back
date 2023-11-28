<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AboutInfo extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'about_info';
    protected $guarded = [];
    public $translationModel = AboutInfoTranslation::class;
    public $translatedAttributes = ['title','text'];
}
