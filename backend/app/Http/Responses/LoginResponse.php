<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements Responsable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $supervisorId;

    public function __construct($id, $name, $token, $supervisorId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->token = $token;
        $this->supervisorId = $supervisorId;
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
            [
                'id' => $this->id, 'name' => $this->name, 'token' => $this->token, 'supervisor_id' => $this->supervisorId
            ],
            Response::HTTP_OK
        );
    }
}
