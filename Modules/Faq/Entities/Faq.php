<?php namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Translatable;

    protected $table = 'faq__faqs';
    public $translatedAttributes = ['question', 'answer'];
    protected $fillable = ['question', 'answer'];
}
