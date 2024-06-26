<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @param string $salesRepId
     */
    public function findBySalesRepId($salesRepId)
    {
    }

    /**
     * @param array $customerId
     */
    public function updateById($customer)
    {
        return Customer::where('id', $customer['id'])
            ->update([
                'honorific' => $customer['honorific'], 'first_name' => $customer['first_name'], 'last_name' => $customer['last_name'], 'house_number' => $customer['house_number'], 'street' => $customer['street'], 'account' => $customer['account']
            ]);
    }

    /**
     * @param string $customerId
     * @return int deleted num
     */
    public function deleteById($customerId)
    {
        return Customer::destroy($customerId);
    }
}
