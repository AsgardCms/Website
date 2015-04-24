<?php namespace Asgard;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $table = 'activatations';
    protected $fillable = ['entry_id', 'code', 'completed', 'completed_at'];
}
