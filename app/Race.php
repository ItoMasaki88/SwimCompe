<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
  protected $guarded =array('id');

  /**
   * 対応するEventを取得
   */
  public function event()
  {
      return $this->belongsTo('App\Event');
  }

  public function getEventIdAttribute()
  {
    return $this->attributes['event_id'];
  }
}
