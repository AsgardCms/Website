<?php namespace Modules\Profile\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Translatable;

    protected $table = 'profile__profiles';
    public $translatedAttributes = [];
    protected $fillable = [];
}
