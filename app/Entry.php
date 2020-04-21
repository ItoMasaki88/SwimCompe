<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
  /**
   * エントリーするRaceを取得
   */
  public function race()
  {
      return $this->belongsTo('App\Race');
  }
}
