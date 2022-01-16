<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
  protected static function bootUsesUuid() {
    static::creating(function ($model) {
      if (! $model->getKey()) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      }
    });
  }

  /*Here, we use the \Illuminate\Support\Str class 
  to easily generate UUIDs. The getIncrementing() 
  method tells Laravel that the IDs on this model 
  will not be incrementing (as we are returning false)
  */

  public function getIncrementing()
  {
      return false;
  }

  /*the getKeyType() method tells Laravel the primary key will be of type string. The bootUsesUuid() 
  method allows us to tap the power of Laravel lifecycle hooks
  */

  public function getKeyType()
  {
      return 'string';
  }
}

?>