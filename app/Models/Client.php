<?php
namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    protected $table = 'clients';
    protected $guarded = [];
    public $translationModel = ClientTranslation::class;
    public $translatedAttributes = ['title','text'];
}