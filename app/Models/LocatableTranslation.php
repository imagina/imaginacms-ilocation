<?php

namespace Modules\Ilocation\Models;

use Illuminate\Database\Eloquent\Model;

class LocatableTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'title', 'description'
  ];
  protected $table = 'ilocation__locatable_translations';
}
