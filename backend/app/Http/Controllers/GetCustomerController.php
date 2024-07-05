<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetCustomerRequest;
use App\Http\Responses\GetCustomerResponse;
use App\Interfaces\SalesRepRepositoryInterface;
use Exception;

class GetCustomerController extends Controller
{
    private SalesRepRepositoryInterface $salesRepRepRepository;

    public function __construct(SalesRepRepositoryInterface $salesRepRepRepository)
    {
        $this->salesRepRepRepository = $salesRepRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetCustomerRequest $request)
    {
        try {
            $validated = $request->validated();
            $customers = $this->salesRepRepRepository->findCustomerById($validated['id']);
            return new GetCustomerResponse($customers);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
