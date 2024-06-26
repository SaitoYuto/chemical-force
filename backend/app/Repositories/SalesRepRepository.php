<?php

namespace App\Repositories;

use App\Interfaces\SalesRepRepositoryInterface;
use App\Models\SalesRep;

class SalesRepRepository implements SalesRepRepositoryInterface
{

    /**
     * @param string $salesRepId
     * @param boolean $hiddenPivot
     */
    public function findWorkingAreaById($salesRepId, $hiddenPivot)
    {
        $workings = SalesRep::with('works')->find($salesRepId)->works;
        if ($hiddenPivot) {
            return $workings->makeHidden('pivot');
        }
        return $workings;
    }

    /**
     * @param string $salesRepId
     */
    public function findCustomerById($salesRepId)
    {
        return SalesRep::with('deals')->find($salesRepId)->deals->select(['id', 'honorific', 'first_name', 'last_name', 'house_number', 'street', 'account']);
    }

    /**
     * @param string $salesRepId
     */
    public function findProductById($salesRepId)
    {
        return SalesRep::with('oversees')->find($salesRepId)->oversees->select(['id', 'name', 'description', 'price', 'volume', 'unit']);
    }
}
