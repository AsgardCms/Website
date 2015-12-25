<?php namespace Modules\Module\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['slug', 'name'];
    protected $table = 'module__category_translations';
}
