<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded =array('id');

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    /**=======バリデーション関連=====================================================
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array(
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed|regex:/^[a-zA-Z0-9]+$/',
      'age' => 'required|integer',
      'sex' => 'required|boolean',
    );

    /**
     * エラー返信処理
     *
     * @var array
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

  	public function errors()
  	{
    	return $this->errors;
  	}
    /**バリデーションここまで=================================================
     */



   /**
    * エントリーオブジェクト取得
    *
    * @return object(Entries)
    */
    public function entries()
    {
      return $this->hasMany('App\Entry');
    }


    /*=========出場レギュレーション関連====================================*/
    /**
    * 年齢に関する出場レギュレーション分類
    *
    * @param int
    * @return array(int)
    *
    */
    public function ageClassify() {
      $age = $this->attributes['age'];
      if (6<=$age | $age<=12) {
        return array(1, );
      } elseif (12<$age | $age<=15) {
        return array(2, );
      } elseif (15<$age | $age<=18) {
        return array(3, );
      } elseif (18<$age | $age<30) {
        return array(4, );
      } elseif (30<=$age | $age<50) {
        return array(4, 5,);
      } elseif (50<=$age) {
        return array(4, 5, 6,);
      }
    }

    /**
    * 性別に関する出場レギュレーション分類
    *
    * @param boolean
    * @return array(int)
    */
    public function sexClassify() {
      $sex = $this->attributes['sex'] == 1;
      if ($sex) {
        return array(1, 3,);
      } else {
        return array(2, 3,);
      }
    }
    /*=========出場レギュレーション分類 ここまで==============================*/




    /**====================================================================
    *  Userモデルの各属性取得
    *
     * Get 性別
     *
     * @param
     * @return string
    **/
    public function getTextSexAttribute()
    {
      if ($this->attributes['sex']==1) $sex = '男性';
      else $sex = '女性';
      return $sex;
    }

    /**
     * Get ID
     *
     * @param
     * @return string
    **/
    public function getIdAttribute()
    {
      return $this->attributes['id'];
    }
    /**
     * Get 氏名
     *
     * @param
     * @return string
    **/
    public function getNameAttribute()
    {
      return $this->attributes['name'];
    }
    /**
     * Get Email
     *
     * @param
     * @return string
    **/
    public function getEmailAttribute()
    {
      return $this->attributes['email'];
    }
    /**
     * Get 年齢
     *
     * @param
     * @return string
    **/
    public function getAgeAttribute()
    {
      return $this->attributes['age'];
    }
    /**
    *  Userモデルの各属性取得　ここまで
    *************************************************************************/


}
