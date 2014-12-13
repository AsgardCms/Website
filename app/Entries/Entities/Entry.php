<?php namespace Asgard\Entries\Entities;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';
    protected $fillable = ['email'];
}
