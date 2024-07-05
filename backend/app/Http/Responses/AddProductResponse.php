<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class AddProductResponse implements Responsable
{

    /**
     * @var array
     */
    private $created;

    public function __construct($created)
    {
        $this->created = $created;
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
            ['created' => $this->created],
            Response::HTTP_CREATED
        );
    }
}
