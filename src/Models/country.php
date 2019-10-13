<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function divisions()
    {
        return $this->hasMany(division::class,'country_id');
    }
}
