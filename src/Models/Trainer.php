<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    public $fillable =['first_name'];


    public function divisions()
    {
        return $this->morphToMany(division::class, 'divisionables');
    }
}
