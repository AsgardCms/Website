<?php namespace Modules\Module\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Module extends Model
{
    use MediaRelation;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
