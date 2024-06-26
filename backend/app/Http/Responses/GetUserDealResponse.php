<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use \Symfony\Component\HttpFoundation\Response;

class GetUserDealResponse implements Responsable
{

    /**
     * @var array
     */
    private $customers;

    /**
     * @var array
     */
    private $products;

    public function __construct($customers, $products)
    {
        $this->customers = $customers;
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
            ['customers' => $this->customers, 'products' => $this->products],
            Response::HTTP_OK
        );
    }
}
