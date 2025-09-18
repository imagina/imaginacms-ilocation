<?php

namespace Modules\Ilocation\Events\Handlers;

class StoreLocatable
{
  public function handle($event): void
  {
    $params = $event->params;

    // Get specific data
    $dataFromRequest = $params['data'];
    $model = $params['model'];

    // Handle Form
    if (!empty($dataFromRequest['locatable'])) {
      $this->syncExtraFillable($dataFromRequest, $model);
    }
  }

  public function syncExtraFillable($params, $model): void
  {
    $cityId = $params['locatable']['city_id'] ?? null;
    $countryId = $params['locatable']['country_id'] ?? null;
    $provinceId = $params['locatable']['province_id'] ?? null;
    $address = $params['locatable']['address'] ?? null;
    $lat = $params['locatable']['latitude'] ?? null;
    $lng = $params['locatable']['longitude'] ?? null;

    if ($cityId || $countryId || $provinceId || $lat || $lng || $address) {
      $locatableRepository = app('Modules\Ilocation\Repositories\LocatableRepository');
      $systemName = strtolower(str_replace('\\', '_', get_class($model))) . '_' . $model->id;
      $locatableRepository->updateOrCreate([
        'systemName' => $systemName,
        'entityType' => get_class($model),
        'entityId' => $model->id,
      ], [
        'city_id' => $cityId,
        'country_id' => $countryId,
        'province_id' => $provinceId,
        'address' => $address,
        'latitude' => $lat,
        'longitude' => $lng,
      ]);
    }
  }
}
