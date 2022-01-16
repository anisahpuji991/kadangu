<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;


class Artist extends Model
{

    use SoftDeletes,UsesUuid;
    public $incrementing = false;

    protected $fillable = [
        'realname',
        'photo',
        'bio',
        'phone'
    ];

   // protected $appends = ['persona'];

    public function persona()
    {
        return $this->hasMany(Persona::class, 'id_artist', 'id');
    }





    //
}
