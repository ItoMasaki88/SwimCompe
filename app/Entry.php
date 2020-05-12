<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
  protected $guarded =array('id');

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'race_id',
  ];


  /**=======リレーション処理===================================
   *
   * エントリーするRaceを取得
   */
  public function race()
  {
      return $this->belongsTo('App\Race');
  }

  /*
  * エントリーする選手を取得 （注　機能せず！！）
  */
   // public function player()
   // {
   //    return $this->belongsTo('App\User');
   // }
  /*
  *=========リレーション処理ここまで==========================
   */


   /**
    * Attribute 取得=============================================================
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
    * Get User_ID
    *
    * @param
    * @return int
   **/
   public function getUserIdAttribute()
   {
     return $this->attributes['user_id'];
   }
   /**
    * Get Race_ID
    *
    * @param
    * @return int
   **/
   public function getRaceIdAttribute()
   {
     return $this->attributes['race_id'];
   }
   /**
    * Get record time
    *
    * @param
    * @return int
   **/
   public function getRecordTimeAttribute()
   {
     if (is_null($this->attributes['recordTime'])) {
       return '--';
     }
     return $this->attributes['recordTime'];
   }
   /**
    * Get record time
    *
    * @param
    * @return string
   **/
   public function getRecordTimeTextedAttribute()
   {
     if (is_null($this->attributes['recordTime'])) {
       return '--';
     }
     $record = $this->attributes['recordTime'];

     $min = floor($record /60);
     $sec = $record - $min*1;

     if ($min == 0) return $sec . '秒';
     else return $min . '分' . $sec . '秒';
   }
   /**
    * Get lane
    *
    * @param
    * @return int
   **/
   public function getLaneAttribute()
   {
     if (is_null($this->attributes['lane'])) {
       return '--';
     }
     return $this->attributes['recordTime'];
   }
   /**
    * Get rank
    *
    * @param
    * @return int
   **/
   public function getRankAttribute()
   {
     if ( is_null($this->attributes['recordTime']) ) {
       return '--';
     }

     $records = [];
     foreach ($this->race->event->races as $race) {
       foreach ($race->entries as $entry) {
         $recordTime = $entry->getRecordTimeAttribute();

         if ($recordTime != '--') {
           \array_push($records, $recordTime);
         }
       }
     }

     \sort($records);
     $rank = \array_search( $this->getRecordTimeAttribute(), $records );

     return $rank + 1;
   }
   /**
    * Attribute 取得　ここまで=============================================================
    *
   **/




   /**=======バリデーション関連=====================================================**/
    /** バリデーションルール
    *
    * @var array
    *
    */
   public static $rules = array(
     'user_id' => 'required|int',
     'race_id' => 'required|int',
   );

   /**
    * エラー返信処理
    *
    * @return boolean
    */
   private $errors;

   public function validate($data)
   {
     $v = Validator::make($data, $this->rules);
     if ($v->fails())
     {
         $this->errors = $v->errors();
         return false;
     }
     return true;
   }

   /**エラーリスト取得
    */
   public function errors()
   {
     return $this->errors;
   }
   /**バリデーションここまで=================================================
    */

}
