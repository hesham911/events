<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    public function country()
    {
        return $this->belongsTo(country::class,'country_id');
    }

    public function workshops()
    {
        return $this->morphedByMany(workshop::class, 'divisionables');
    }

    public function trainers()
    {
        return $this->morphedByMany(trainer::class, 'divisionables');
    }

    public function centers()
    {
        return $this->morphedByMany(center::class, 'divisionables');
    }
}
