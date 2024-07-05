<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    /**
     * @param array $product
     * @return int updated number
     */
    public function create($product);

    /**
     * @param array $product
     * @return int updated number
     */
    public function update($product);

    /**
     * @param string $productId
     * @return int deleted number
     */
    public function deleteById($productId);
}
