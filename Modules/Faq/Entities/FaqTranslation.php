<?php namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
    protected $table = 'faq__faq_translations';
}
