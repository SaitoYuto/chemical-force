<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Responses\AddProductResponse;
use App\Interfaces\ProductRepositoryInterface;
use Exception;

class AddProductController extends Controller
{
    private ProductRepositoryInterface $productRepRepository;

    public function __construct(ProductRepositoryInterface $productRepRepository)
    {
        $this->productRepRepository = $productRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(AddProductRequest $request)
    {
        $validated = $request->validated();
        try {
            return new AddProductResponse($this->productRepRepository->create($validated));
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
