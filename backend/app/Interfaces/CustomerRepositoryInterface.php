<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface
{
    /**
     * @param string $salesRepId
     */
    public function findBySalesRepId($salesRepId);

    /**
     * @param string $customerId
     * @return int updated number
     */
    public function updateById($customerId);

    /**
     * @param string $customerId
     * @return int deleted number
     */
    public function deleteById($customerId);
}
