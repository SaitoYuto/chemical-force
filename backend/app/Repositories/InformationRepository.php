<?php

namespace App\Repositories;

use App\Interfaces\InformationRepositoryInterface;
use App\Models\Information;

class InformationRepository implements InformationRepositoryInterface
{
    public function getRecentInfo()
    {
        return Information::select('id', 'title', 'content')->orderBy('updated_at', 'asc')->limit(5)->get();
    }
}
