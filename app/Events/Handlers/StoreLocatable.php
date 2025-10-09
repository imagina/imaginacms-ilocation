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
      $this->syncExtraLocatable($dataFromRequest, $model);
    }
  }

  public function syncExtraLocatable($params, $model): void
  {
    $locatables = collect($params['locatable']);

    if (!isset($locatables[0])) {
      $locatables = collect([$params['locatable']]);
    }

    $model->locatable()->forceDelete();

    foreach ($locatables as $locatable) {
      $cityId = $locatable['city_id'] ?? null;
      $countryId = $locatable['country_id'] ?? null;
      $provinceId = $locatable['province_id'] ?? null;
      $address = $locatable['address'] ?? null;
      $lat = $locatable['latitude'] ?? null;
      $lng = $locatable['longitude'] ?? null;

      if ($cityId || $countryId || $provinceId || $lat || $lng || $address) {
        $dataToSave = [
          'city_id' => $cityId,
          'country_id' => $countryId,
          'province_id' => $provinceId,
          'address' => $address,
          'latitude' => $lat,
          'longitude' => $lng
        ];

        $availableLocales = array_keys(getSupportedLocales());

        foreach ($availableLocales as $locale) {
          if (isset($locatable[$locale]['title'])) {
            $dataToSave[$locale]['title'] = $locatable[$locale]['title'];
          }
          if (isset($locatable[$locale]['description'])) {
            $dataToSave[$locale]['description'] = $locatable[$locale]['description'];
          }
        }

        $model->locatable()->create($dataToSave);
      }
    }
  }
}
