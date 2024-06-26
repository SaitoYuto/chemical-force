<?php

namespace App\Repositories;

use App\Interfaces\AreaRepositoryInterface;
use App\Models\Area;

class AreaRepository implements AreaRepositoryInterface
{
    public function isChiefManager($salesRepId)
    {
        return Area::where('manager_id', $salesRepId)->exists();
    }
}
