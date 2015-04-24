<?php namespace Modules\Entry\Entities;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $table = 'activations';
    protected $fillable = ['entry_id', 'code', 'completed', 'completed_at'];

    public function user()
    {
        return $this->belongsTo('Modules\Entry\Entities\Entry');
    }
}
