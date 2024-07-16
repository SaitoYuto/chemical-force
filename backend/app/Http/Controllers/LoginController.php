<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\ErrorResponse;
use Illuminate\Support\Facades\Auth;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();
        try {
            if (!Auth::attempt($validated)) {
                return new ErrorResponse(
                    [ErrorMessages::INVALID_CREDENTIAL],
                    Response::HTTP_UNAUTHORIZED
                );
            }
            /** @var \App\Models\User **/
            $user = Auth::user();
            return new LoginResponse(
                $user->id,
                $user->name,
                $user->createToken('auth_token')->plainTextToken,
                $user->maps->supervisor_id,
            );
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
