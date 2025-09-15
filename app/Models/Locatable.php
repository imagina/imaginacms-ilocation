<?php

namespace Modules\Ilocation\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Imagina\Icore\Models\CoreModel;

class Locatable extends CoreModel
{
  use Translatable;

  protected $table = 'ilocation__locatables';
  public string $transformer = 'Modules\Ilocation\Transformers\LocatableTransformer';
  public string $repository = 'Modules\Ilocation\Repositories\LocatableRepository';
  public array $requestValidation = [
    'create' => 'Modules\Ilocation\Http\Requests\CreateLocatableRequest',
    'update' => 'Modules\Ilocation\Http\Requests\UpdateLocatableRequest',
  ];
  //Instance external/internal events to dispatch with extraData
  public array $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];

  public $translatedAttributes = [
    'title', 'description'
  ];
  protected $fillable = [
    'system_name',
    'entity_id',
    'entity_type',
    'city_id',
    'province_id',
    'country_id',
    'latitude',
    'longitude',
    'address'
  ];

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class);
  }

  public function province(): BelongsTo
  {
    return $this->belongsTo(Province::class);
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }
}
