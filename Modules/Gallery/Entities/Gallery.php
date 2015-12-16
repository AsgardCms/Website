<?php namespace Modules\Gallery\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Gallery extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'gallery__galleries';
    public $translatedAttributes = ['description'];
    protected $fillable = [
        'website_url',
        'website_name',
        'has_hidden_website_url',
        'owner_url',
        'owner_name',
        'description'
    ];
    protected $casts = [
        'has_hidden_website_url' => 'boolean',
    ];

    public function getImageAttribute()
    {
        return $this->files()->where('zone', 'image')->first();
    }
}
