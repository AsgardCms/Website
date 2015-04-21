<?php namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use Translatable;

    protected $table = 'faq__questions';
    public $translatedAttributes = ['name'];
    protected $fillable = ['name'];
}
