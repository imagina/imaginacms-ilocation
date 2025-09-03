<?php

namespace Modules\Ilocation\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'name',
    'full_name'
  ];
  protected $table = 'ilocation__country_translations';
}
