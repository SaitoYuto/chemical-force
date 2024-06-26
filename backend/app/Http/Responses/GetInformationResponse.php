<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class GetInformationResponse implements Responsable
{

    /**
     * @var string
     */
    private $information;

    public function __construct($information)
    {
        $this->information = $information;
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
            ['information' => $this->information],
            Response::HTTP_OK
        );
    }
}
