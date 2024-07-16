<?php

namespace App\Repositories;

use App\Interfaces\InformationRepositoryInterface;
use App\Models\Information;

class InformationRepository implements InformationRepositoryInterface
{
    /**
     * Get the most recent 5 records from Information table
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecentInfo()
    {
        return Information::select('id', 'title', 'content')
            ->orderBy('updated_at', 'asc')
            ->limit(5)
            ->get();
    }
}
