<?php

namespace Modules\Ilocation\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'name'
  ];
  protected $table = 'ilocation__province_translations';
}
