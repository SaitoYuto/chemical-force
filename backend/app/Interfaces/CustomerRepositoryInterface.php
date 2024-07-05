<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface
{
    /**
     * @param array $customer
     * @return Customer customer model
     */
    public function create($customer);

    /**
     * @param array $customer
     * @return int updated number
     */
    public function update($customer);

    /**
     * @param string $customerId
     * @return int deleted number
     */
    public function deleteById($customerId);
}
