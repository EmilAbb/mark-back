<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'practice';
    protected $guarded = [];
    public $translationModel = PracticeTranslation::class;
    public $translatedAttributes = ['title','text'];
}
