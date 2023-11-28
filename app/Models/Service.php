<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements  TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'services';
    protected $guarded = [];
    public $translationModel = ServiceTranslation::class;
    public $translatedAttributes = ['title','text'];
 }
