<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Api\AuthResource;
use App\Models\User;
use App\Support\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use ApiResponse;

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return $this->successResponse(AuthResource::make($user), message: 'Welcome To System');
    }
}
