<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use \Symfony\Component\HttpFoundation\Response;

class DeleteCustomerResponse implements Responsable
{

    /**
     * @var string
     */
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
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
            ['deleted' => $this->num],
            Response::HTTP_OK
        );
    }
}
