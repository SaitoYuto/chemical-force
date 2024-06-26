<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use \Symfony\Component\HttpFoundation\Response;

class GetAreaResponse implements Responsable
{

    /**
     * @var array
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
            ['areas' => $this->areas],
            Response::HTTP_OK
        );
    }
}
