<?php namespace Modules\Module\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

/**
 * @property \Carbon\Carbon submitted_at
 * @property \Carbon\Carbon rejected_at
 * @property \Carbon\Carbon published_at
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 */
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
     * Is the current module in review ?
     * @return bool
     */
    public function isInReview()
    {
        return $this->submitted_at === '0000-00-00 00:00:00';
    }
}
