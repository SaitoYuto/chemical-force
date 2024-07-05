<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class GetProductResponse implements Responsable
{

    /**
     * @var array
     */
    private $products;

    public function __construct($products)
    {
        $this->products = $products;
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
            ['products' => $this->products],
            Response::HTTP_OK
        );
    }
}
