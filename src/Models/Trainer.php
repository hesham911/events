<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    public $fillable =[
        'first_name',
        'last_name',
        'address',
        'email',
        'num_phone',
        'work_num_phone',
        'url_fb',
        'url_twitter',
        'url_linked_in',
        'portfolio_link',
        'cv',
        'field',
        'block',
        'active',
    ];


    public function divisions()
    {
        return $this->morphToMany(division::class, 'divisionables');
    }
}
