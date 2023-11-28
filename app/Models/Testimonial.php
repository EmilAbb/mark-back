<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $table = 'testimonials';
    protected $guarded = [];
    public $translationModel = TestimonialTranslation::class;
    public  $translatedAttributes = ['title', 'text'];
}
