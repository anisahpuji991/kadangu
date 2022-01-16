<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes,UsesUuid;
    public $incrementing = false;

    protected $fillable = [
        'name'
    ];
}
