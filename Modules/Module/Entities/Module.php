<?php namespace Modules\Module\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module__modules';
    protected $fillable = [
        'category_id',
        'user_id',
        'packagist_url',
        'is_published',
        'vendor',
        'name',
        'slug',
        'excerpt',
        'description',
        'documentation',
        'changelog',
        'favourites',
        'total_downloads',
        'monthly_downloads',
        'daily_downloads',
    ];
}
