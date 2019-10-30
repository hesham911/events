<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class center extends Model
{
    public $fillable =[
        'title',
        'address',
        'num_phone',
        'email',
        'url_fb',
        'url_twitter',
        'website',
        'logo',
        'num_class_room',
        'Air_conditioned_place',
    ];


    public function divisions()
    {
        return $this->morphToMany(division::class, 'divisionables');
    }
}
