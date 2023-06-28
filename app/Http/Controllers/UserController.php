<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Services\Users\Impl\UserServiceImpl;
use App\DataTransferObjects\User\StoreUserData;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
   /**
   * @param UserService $UserService
   */
   public function __construct(protected UserServiceImpl $userService)
   {
      $this -> userService = $userService;
   }

   /**
   * Store a newly created resource in storage.
   */
   public function store(Request $request): JsonResponse
   {
      $user = new UserResource($this->userService->create(StoreUserData::from($request)));
      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
         'data' => $user,
         'access_token' => $token,
      ]);
   }

   public function login(Request $request): JsonResponse
   {
      if (!Auth::attempt($request->only('email', 'password'))) {
         throw new AuthenticationException();
      }

      $user = User::where('email', $request->email)->first();
      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
         'data' => $user,
         'access_token' => $token,
      ]);
   }

   public function logout(Request $request): JsonResponse
   {
      $request->user()->currentAccessToken()->delete();
      // auth()->user()->tokens()->delete();

      return response()->json([
         'message' => 'Logged out'
      ]);
   }
}
