<?php

namespace App\Models;

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'about';
    protected $guarded = [];
    public $translationModel = AboutTranslation::class;
    public  $translatedAttributes = ['link'];
}
