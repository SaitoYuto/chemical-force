<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetProductRequest;
use App\Http\Responses\SetProductResponse;
use App\Http\Responses\ErrorResponse;
use App\Interfaces\ProductRepositoryInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class SetProductController extends Controller
{
    private ProductRepositoryInterface $productRepRepository;

    public function __construct(ProductRepositoryInterface $productRepRepository)
    {
        $this->productRepRepository = $productRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(SetProductRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->productRepRepository->update($validated);
            if (!$result) {
                return new ErrorResponse(
                    [ErrorMessages::NO_RECORD_TO_UPDATE],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            return new SetProductResponse($result);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
