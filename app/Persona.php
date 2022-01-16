<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes,UsesUuid;
    public $incrementing = false;

    protected $fillable = [
        'id_artist',
        'alias_name',
        'sosmed'
    ];

   // protected $appends = ['artist'];

    public function artist()
    {
        //return $this->belongsTo(Artist::class, 'id_artist', 'id');
        return $this->belongsTo(Artist::class,'id_artist', 'id');
    }

}
