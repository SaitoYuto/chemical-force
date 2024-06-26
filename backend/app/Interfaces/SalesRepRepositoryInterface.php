<?php

namespace App\Interfaces;

interface SalesRepRepositoryInterface
{
    /**
     * @param string $salesRepId
     * @param boolean $hiddenPivot
     */
    public function findWorkingAreaById($salesRepId, $hiddenPivot);

    /**
     * @param string $salesRepId
     */
    public function findCustomerById($salesRepId);

    /**
     * @param string $salesRepId
     */
    public function findProductById($salesRepId);
}
