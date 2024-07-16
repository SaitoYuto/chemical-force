<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAreaRequest;
use App\Http\Responses\GetAreaResponse;
use App\Models\Area;
use Exception;

class GetAreaController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetAreaRequest $request)
    {
        $validated = $request->validated();
        try {
            $results = Area::whereHas('workers', function ($query) use ($validated) {
                $query->where('sales_rep_id', $validated["id"]);
            })->with('manager:id')->get();
            return new GetAreaResponse($results);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
