<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterFinalRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected UserService $userService
        ) {}

    /**
     * Register a new user
     */
     // Validate step 1 fields
     public function validateStep1(RegisterStep1Request $request)
     {
        return response()->success(['ok' => true], 'Step 1 success');
     }

     // Validate step 2 fields
     public function validateStep2(RegisterStep2Request $request)
     {
        return response()->success(['ok' => true], 'Step 2 success');
     }

     // Final submission: create User + Company, save brochure
     public function final(RegisterFinalRequest $request)
     {

        $data = $request->validated();

        $user = $this->userService->create($data, $request);

        return response()->success([
            'user'  => new UserResource($user),
        ], 'User registered successfully', 201);
     }

    /**
     * Login user and issue token
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->error('Invalid credentials', [], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->success([
            'user'  => new UserResource($user),
            'token' => $token,
        ], 'Login successful');
    }

    /**
     * Logout user (revoke tokens)
     */
    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->success(null, 'Logged out successfully');
    }

    /**
     * Get authenticated user
     */
    public function me(): JsonResponse
    {
        return response()->success(new UserResource(Auth::user()));
    }
}
