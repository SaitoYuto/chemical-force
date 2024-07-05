<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @param array $customer
     * @return Customer customer model
     */
    public function create($customer)
    {
        return Customer::create([
            "id" => $customer["id"],
            'honorific' => $customer['honorific'],
            'first_name' => $customer['first_name'],
            'last_name' => $customer['last_name'],
            'house_number' => $customer['house_number'],
            'street' => $customer['street'],
            'account' => $customer['account'],
            'sales_rep_id' => $customer["sales_rep_id"]
        ]);
    }

    /**
     * @param array $customer
     * @return int updated num
     */
    public function update($customer)
    {
        return Customer::where('id', $customer['id'])
            ->update([
                'honorific' => $customer['honorific'],
                'first_name' => $customer['first_name'],
                'last_name' => $customer['last_name'],
                'house_number' => $customer['house_number'],
                'street' => $customer['street'],
                'account' => $customer['account']
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
