<?php namespace Modules\Module\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Support\Traits\MediaRelation;

/**
 * @property string packagist_uri
 * @property string vendor
 * @property string name
 * @property string slug
 * @property string excerpt
 * @property string description
 * @property string documentation
 * @property string changelog
 * @property integer daily_downloads
 * @property integer monthly_downloads
 * @property integer total_downloads
 * @property integer favourites
 * @property \Carbon\Carbon submitted_at
 * @property \Carbon\Carbon rejected_at
 * @property \Carbon\Carbon published_at
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 */
class Module extends Model
{
    use MediaRelation, PresentableTrait;

    protected $presenter = \Modules\Module\Presenters\Module::class;
    protected $table = 'module__modules';
    protected $fillable = [
        'category_id',
        'user_id',
        'packagist_uri',
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

    public function user()
    {
        $driver = config('asgard.user.users.driver', 'Sentinel');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }

    public function submitForApproval()
    {
        $this->submitted_at = Carbon::now();

        return $this->save();
    }

    /**
     * @return bool
     */
    public function publish()
    {
        $this->published_at = Carbon::now();

        return $this->save();
    }

    /**
     * @return bool
     */
    public function reject()
    {
        $this->rejected_at = Carbon::now();

        return $this->save();
    }

    /**
     * Is the current module in review ?
     * @return bool
     */
    public function isInReview()
    {
        return $this->submitted_at !== null;
    }

    public function getImagesAttribute()
    {
        return $this->files()->where('zone', 'module_gallery')->get();
    }
}
