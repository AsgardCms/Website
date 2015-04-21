<?php namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'faq__questions_translations';
}
