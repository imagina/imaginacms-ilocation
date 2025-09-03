<?php

namespace Modules\Ilocation\Models;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'name'
  ];
  protected $table = 'ilocation__city_translations';
}
