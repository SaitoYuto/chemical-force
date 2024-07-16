<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class GetAreaResponse implements Responsable
{

    /**
     * @var Eloquent\Collection
     */
    private $areas;

    public function __construct($areas)
    {
        $this->areas = $areas;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function toResponse($request)
    {
        return response()->json(
            ['areas' => $this->areas->map(function ($area) {
                return [
                    'id' => $area->id,
                    'name' => $area->name,
                    'depot' => $area->depot,
                    'sales_target' => $area->sales_target,
                    'image' => "image/{$area->id}.jpg",
                    'manager_id' => $area->manager_id,
                    'manager_name' => $area->manager->user->name ?? null,
                ];
            })],
            Response::HTTP_OK
        );
    }
}
