<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class ErrorResponse implements Responsable
{
    /**
     * @var array
     */
    protected $messages;

    /**
     * @var int
     */
    protected $code;

    /**
     * Constructor.
     * 
     * @param array $messages
     * @param int $code
     */
    public function __construct($messages, $code)
    {
        $this->messages = $messages;
        $this->code = $code;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function toResponse($request)
    {
        return response()->json([
            'errors' => $this->messages,
        ], $this->code);
    }
}
