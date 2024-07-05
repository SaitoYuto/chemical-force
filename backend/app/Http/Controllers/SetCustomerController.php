<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetCustomerRequest;
use App\Http\Responses\SetCustomerResponse;
use App\Http\Responses\ErrorResponse;
use App\Interfaces\CustomerRepositoryInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class SetCustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepRepository;

    public function __construct(CustomerRepositoryInterface $customerRepRepository)
    {
        $this->customerRepRepository = $customerRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(SetCustomerRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->customerRepRepository->update($validated);
            if (!$result) {
                return new ErrorResponse(
                    [ErrorMessages::NO_RECORD_TO_UPDATE],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            return new SetCustomerResponse($result);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
