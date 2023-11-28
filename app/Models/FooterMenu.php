<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'footer_menu';
    public $translationModel = FooterMenuTranslation::class;
    protected $guarded = [];
    public $translatedAttributes = ['title'];
}
