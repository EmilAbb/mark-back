<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $table= 'contacts';
    protected $guarded = [];
    public $translationModel = ContactTranslation::class;
    public $translatedAttributes = ['title','text','description_one','description_two'];
}
