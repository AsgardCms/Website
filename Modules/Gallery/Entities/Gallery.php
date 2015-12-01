<?php namespace Modules\Gallery\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use Translatable;

    protected $table = 'gallery__galleries';
    public $translatedAttributes = [];
    protected $fillable = [];
}
