<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\Api\AuthResource;
use App\Models\User;
use App\Support\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;

    public function __invoke(LoginRequest $request)
    {
        $user = User::firstWhere(['email' => $request->email]);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse(message: 'Wrong Credential', code: 401);
        }

        $user->tokens()->delete();
        $user->_token = $user->createToken('Robusta_Task')->plainTextToken;

        return $this->successResponse(AuthResource::make($user), message: 'Success Login');
    }
}
