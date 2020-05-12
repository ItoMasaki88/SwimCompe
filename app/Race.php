<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Race extends Model
{
  protected $guarded =array('id');


  /**
   * リレーション処理=============================================================
  **/
  public function entries()
  {
      return $this->hasMany('App\Entry');
  }
  /**
  * 対応するEventを取得
  */
  public function event()
  {
    return $this->belongsTo('App\Event');
  }

  /**
   * リレーション処理　ここまで=============================================================
  **/



  /**
   * アクセサ=============================================================
   *
  **/
  /**
   * Get ID
   *
   * @param
   * @return int
  **/
  public function getIdAttribute()
  {
    return $this->attributes['id'];
  }
  /**
   * Get start Time
   *
   * @param
   * @return int
  **/
  public function getStartTimeAttribute()
  {
    return $this->attributes['startTime'];
  }
  /**
   * Get start Time yyyy/mm/dd hh:mm
   *
   * @param
   * @return int
  **/
  public function getStartTimeTextedAttribute()
  {
    $time = new Carbon( $this->attributes['startTime'] );
    return $time->year . '/' . $time->month . '/' . $time->day
          . ' ' . $time->hour . ':' . $time->minute;
  }
  /**
   * Get event ID
   *
   * @param
   * @return int
  **/
  public function getEventIdAttribute()
  {
    return $this->attributes['event_id'];
  }
  /**
   * Get race number
   *
   * @param
   * @return int
  **/
  public function getNumberAttribute()
  {
     $races = $this->event->races;
     $id = $this->attributes['id'];

     $i =1;
     foreach ($races as $race) {
       if ($race->id == $id) {
         return $i;
       }
       $i++;
     }
     return '--';
  }
  /**
   * アクセサ　ここまで=============================================================
   *
  **/
}
