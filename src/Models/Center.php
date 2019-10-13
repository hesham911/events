<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class center extends Model
{
    public $fillable =['title'];


    public function divisions()
    {
        return $this->morphToMany(division::class, 'divisionables');
    }
}
