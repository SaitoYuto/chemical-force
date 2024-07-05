<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductRequest;
use App\Http\Responses\GetProductResponse;
use App\Interfaces\SalesRepRepositoryInterface;
use Exception;

class GetProductController extends Controller
{
    private SalesRepRepositoryInterface $salesRepRepRepository;

    public function __construct(SalesRepRepositoryInterface $salesRepRepRepository)
    {
        $this->salesRepRepRepository = $salesRepRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $products = $this->salesRepRepRepository->findProductById($validated['id']);
            return new GetProductResponse($products);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
