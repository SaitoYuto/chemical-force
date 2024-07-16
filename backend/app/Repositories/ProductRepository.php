<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @param array $product
     * @return Product product model
     */
    public function create($product)
    {
        return Product::create([
            "id" => $product["id"],
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'volume' => $product['volume'],
            'unit' => $product['unit'],
            'sales_rep_id' => $product["sales_rep_id"]
        ]);
    }

    /**
     * @param array $product
     * @return int updated num
     */
    public function update($product)
    {
        return Product::where('id', $product['id'])
            ->update([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'volume' => $product['volume'],
                'unit' => $product['unit']
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
