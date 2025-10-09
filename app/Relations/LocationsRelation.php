<?php

namespace Modules\Ilocation\Relations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class LocationsRelation
{
    public function resolve(Model $model): MorphMany
    {
        return $model->morphMany("Modules\Ilocation\Models\Locatable", 'entity');
    }
}
