<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAreaRequest;
use App\Http\Responses\GetAreaResponse;
use App\Interfaces\SalesRepRepositoryInterface;
use Exception;

class GetAreaController extends Controller
{
    private SalesRepRepositoryInterface $salesRepRepository;

    public function __construct(SalesRepRepositoryInterface $salesRepRepository)
    {
        $this->salesRepRepository = $salesRepRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetAreaRequest $request)
    {
        $validated = $request->validated();
        try {
            $workingAreas = $this->salesRepRepository->findWorkingAreaById($validated['id'], true);
            return new GetAreaResponse($workingAreas);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
