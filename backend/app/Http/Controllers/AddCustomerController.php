<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Responses\AddCustomerResponse;
use App\Interfaces\CustomerRepositoryInterface;
use Exception;

class AddCustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepRepository;

    public function __construct(CustomerRepositoryInterface $customerRepRepository)
    {
        $this->customerRepRepository = $customerRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(AddCustomerRequest $request)
    {
        $validated = $request->validated();
        try {
            return new AddCustomerResponse($this->customerRepRepository->create($validated));
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
