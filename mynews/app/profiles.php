<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
  protected $guarded = array('id');

  // 以下を追記
  public static $rules = array(
      'name' => 'required',
      'gender' => 'required',
      'hoby' => 'required',
      'introduction' => 'required',
  );    //
}
