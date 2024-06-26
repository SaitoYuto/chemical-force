<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteCustomerRequest;
use App\Http\Responses\DeleteCustomerResponse;
use App\Http\Responses\ErrorResponse;
use App\Interfaces\CustomerRepositoryInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class DeleteCustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepRepository;

    public function __construct(CustomerRepositoryInterface $customerRepRepository)
    {
        $this->customerRepRepository = $customerRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteCustomerRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->customerRepRepository->deleteById($validated['id']);
            if (!$result) {
                return new ErrorResponse(
                    [ErrorMessages::NO_RECORD_TO_DELETE],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            return new DeleteCustomerResponse($result);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
