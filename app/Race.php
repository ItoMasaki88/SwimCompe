<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
  /**
   * 対応するEventを取得
   */
  public function event()
  {
      return $this->belongsTo('App\Event');
  }
}
