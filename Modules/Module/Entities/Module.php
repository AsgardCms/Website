<?php namespace Modules\Module\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module__modules';
    protected $fillable = [
        'is_published',
        'vendor',
        'name',
        'slug',
        'excerpt',
        'description',
        'documentation',
        'changelog',
    ];
}
