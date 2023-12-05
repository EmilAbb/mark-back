<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    use HasFactory ,Translatable;
    protected $table = 'menus';
    protected $guarded = [];
    public $translationModel = MenuTranslation::class;
    public  $translatedAttributes = ['title','text'];
}
