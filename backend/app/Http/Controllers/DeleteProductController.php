<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Responses\DeleteProductResponse;
use App\Http\Responses\ErrorResponse;
use App\Interfaces\ProductRepositoryInterface;
use Exception;
use \Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{
    private ProductRepositoryInterface $productRepRepository;

    public function __construct(ProductRepositoryInterface $productRepRepository)
    {
        $this->productRepRepository = $productRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteProductRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->productRepRepository->deleteById($validated['id']);
            if (!$result) {
                return new ErrorResponse(
                    [ErrorMessages::NO_RECORD_TO_DELETE],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            return new DeleteProductResponse($result);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
