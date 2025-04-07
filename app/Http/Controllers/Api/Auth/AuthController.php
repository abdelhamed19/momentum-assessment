<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

class AuthController extends Controller
{
    use ResponseTrait;
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        try {
            if (!auth()->attempt($credentials)) {
                return $this->error(
                    'Invalid credentials',
                    401
                );
            }
            $user = auth()->user();
            return $this->success(
                'Login successful',
                200,
                AuthResource::make($user)
            );
        } catch (\Exception $e) {
            return $this->error(
                'Login failed',
                400
            );
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return $this->success(
                'Logout successful',
                200,
                []
            );
        } catch (\Exception $e) {
            return $this->error(
                $e->getMessage(),
                400
            );
        }
    }
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->validated());
            DB::commit();
            return $this->success(
                'User created successfully',
                201,
                AuthResource::make($user)
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error(
                'User creation failed',
                400
            );
        }
    }
}
