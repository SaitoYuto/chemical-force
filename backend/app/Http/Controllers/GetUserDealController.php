<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserDealRequest;
use App\Http\Responses\GetUserDealResponse;
use App\Interfaces\SalesRepRepositoryInterface;
use Exception;

class GetUserDealController extends Controller
{
    private SalesRepRepositoryInterface $salesRepRepRepository;

    public function __construct(SalesRepRepositoryInterface $salesRepRepRepository)
    {
        $this->salesRepRepRepository = $salesRepRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetUserDealRequest $request)
    {
        try {
            $validated = $request->validated();
            $customers = $this->salesRepRepRepository->findCustomerById($validated['id']);
            $products = $this->salesRepRepRepository->findProductById($validated['id']);
            return new GetUserDealResponse($customers, $products);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
