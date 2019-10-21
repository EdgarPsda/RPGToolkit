<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    use SoftDeletes;

    protected $fillable = ['fname', 'lname', 'level', 'race', 'class', 'weapon', 'stats'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];
}
