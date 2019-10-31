<?php

namespace S3geeks\Events\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $table = 'uploads';

    protected $fillable  = ['id','name','size','type'];

}
