<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Http\Traits\UsesUuid;

class News extends Model
{
    use SoftDeletes,UsesUuid;
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'photo_thumbnail',
        'photo_potrait',
        'published_at',
    ];
}
