<?php namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial__testimonials';
    protected $fillable = ['name', 'content', 'url'];
}
