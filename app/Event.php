<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $guarded =array('id');

  /**
   * 状態定義
   * [
   * 泳法,
   * 距離,
   * 対象性別,
   * 対象年齢区分,
   * ]
  **/
   const STYLE = [
       1 => '自由形',
       2 => '平泳ぎ',
       3 => '背泳ぎ',
       4 => 'バタフライ',
       5 => 'メドレー',
   ];

   const DISTANCE = [
       1 => '50m',
       2 => '100m',
       3 => '200m',
   ];

   const SEX = [
       1 => '男子',
       2 => '女子',
       3 => '男女混合',
   ];

   const AGE = [
       1 => ['label' => '小学生', 'division' => '6~12才',],
       2 => ['label' => '中学生', 'division' => '13~15才',],
       3 => ['label' => '高校生', 'division' => '16~18才',],
       4 => ['label' => '成人', 'division' => '19~才',],
       5 => ['label' => 'ミドル', 'division' => '30~才',],
       6 => ['label' => 'マスター', 'division' => '50~才',],
   ];

   /**
    * Get 泳法
    *
    * @return string
   **/
   public function getSwimTypeAttribute()
   {
     // 状態値
     $i = $this->attributes['swimStyle'];

     // 定義されていなければ空文字を返す
     if (!isset(self::STYLE[$i])) {
         return '';
     }

     return self::STYLE[$i];
   }

   /**
    * Get 距離
    *
    * @return string
   **/
   public function getDistanceAttribute()
   {
     // 状態値
     $i = $this->attributes['distance'];

     // 定義されていなければ空文字を返す
     if (!isset(self::DISTANCE[$i])) {
         return '';
     }

     return self::DISTANCE[$i];
   }

   /**
    * Get 対象性別
    *
    * @param
    * @return string
   **/
   public function getSexAttribute()
   {
     // 状態値
     $i = $this->attributes['qualifyingSex'];

     // 定義されていなければ空文字を返す
     if (!isset(self::SEX[$i])) {
         return '';
     }

     return self::SEX[$i];
   }

   /**
    * Get 対象年齢区分
    *
    * @param
    * @return string
   **/
   public function getAgeLabelAttribute()
   {
     // 状態値
     $i = $this->attributes['qualifyingAge'];

     // 定義されていなければ空文字を返す
     if (!isset(self::AGE[$i])) {
         return '';
     }

     return self::AGE[$i]['label'];
   }

   /**
    * Get 対象年齢区分
    *
    * @param
    * @return string
   **/
   public function getAgeDivisionAttribute()
   {
     // 状態値
     $i = $this->attributes['qualifyingAge'];

     // 定義されていなければ空文字を返す
     if (!isset(self::AGE[$i])) {
         return '';
     }

     return self::AGE[$i]['division'];
   }

   /**
    * Get '個人' or '団体'
    *
    * @param
    * @return string
   **/
   public function getPlayerTypeAttribute()
   {
     return ($this->attributes['playerType']) ? '個人' : '団体';
   }

   /**
    * Get 種目名
    *
    * @param
    * @return string
   **/
   public function getEventNameAttribute()
   {
     //
     return $this->getSexAttribute().' '
            .$this->getAgeLabelAttribute().' '
            .$this->getDistanceAttribute().' '
            .$this->getSwimTypeAttribute();
   }

}
