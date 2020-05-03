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
  * エントリーする選手を取得
  */
   public function player()
   {
      return $this->belongsTo('App\User');
   }
  /*
  *=========リレーション処理ここまで==========================
   */


   /**
    * Attribute 取得=============================================================
    *
   **/
   /**
    * Get record time
    *
    * @param
    * @return int
   **/
   public function getRecordTimeAttribute()
   {
     if (!is_null($this->attributes['recordTime'])) {
       return $this->attributes['recordTime'];
     }
     return '--';
   }
   /**
    * Get rank
    *
    * @param
    * @return int
   **/
   public function getRankAttribute()
   {
     if (!is_null($this->attributes['rank'])) {
       return $this->attributes['rank'];
     }
     return '--';
   }
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
