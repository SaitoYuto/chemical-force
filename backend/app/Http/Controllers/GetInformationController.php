<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetInformationRequest;
use App\Http\Responses\GetInformationResponse;
use App\Interfaces\InformationRepositoryInterface;
use Exception;

class GetInformationController extends Controller
{
    private InformationRepositoryInterface $informationRepRepository;

    public function __construct(InformationRepositoryInterface $informationRepRepository)
    {
        $this->informationRepRepository = $informationRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetInformationRequest $request)
    {
        $request->validated();
        try {
            $information = $this->informationRepRepository->getRecentInfo();
            return new GetInformationResponse($information);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
