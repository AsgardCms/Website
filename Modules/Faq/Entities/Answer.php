<?php namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use Translatable;

    protected $table = 'faq__answers';
    public $translatedAttributes = ['content'];
    protected $fillable = ['content', 'question_id'];
}
