<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @param string $salesRepId
     */
    public function findBySalesRepId($salesRepId)
    {
    }

    /**
     * @param array $product
     */
    public function updateById($product)
    {
        return Product::where('id', $product['id'])
            ->update([
                'name' => $product['name'], 'description' => $product['description'], 'price' => $product['price'], 'volume' => $product['volume'], 'unit' => $product['unit']
            ]);
    }

    /**
     * @param string $productId
     * @return int deleted num
     */
    public function deleteById($productId)
    {
        return Product::destroy($productId);
    }
}
