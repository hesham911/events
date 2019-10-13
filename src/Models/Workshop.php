<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class workshop extends Model
{

    public $fillable = ['title','description','user_id'];
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class,'workshop_trainer');
    }
    public function centers()
    {
        return $this->belongsToMany(Center::class,'workshop_center');

    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function divisions()
    {
        return $this->morphToMany(division::class, 'divisionables');
    }
}
