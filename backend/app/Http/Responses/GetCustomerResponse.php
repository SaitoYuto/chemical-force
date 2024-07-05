<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class GetCustomerResponse implements Responsable
{

    /**
     * @var array
     */
    private $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
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
            ['customers' => $this->customers],
            Response::HTTP_OK
        );
    }
}
