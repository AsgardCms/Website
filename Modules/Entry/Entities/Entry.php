<?php namespace Modules\Entry\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string email
 * @property bool accepted
 */
class Entry extends Model
{
    protected $table = 'entries';
    protected $fillable = ['email', 'accepted'];

    public function activation()
    {
        return $this->hasOne('Modules\Entry\Entities\Activation', 'entry_id', 'id');
    }
}
