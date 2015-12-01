<?php namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['description'];
    protected $table = 'gallery__gallery_translations';
}
