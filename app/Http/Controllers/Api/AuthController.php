<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTGuard;

class AuthController extends Controller
{
    /**
     * @var JWTGuard
     */
    private $guard;

    /**
     * Create a new AuthController instance.
     * @psalm-suppress PropertyTypeCoercion
     * @return void
     */
    public function __construct(AuthManager $auth)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->guard = $auth->guard('api');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {   /** @var array $credentials */
        $credentials = request(['email', 'password']);
        $token = $this->guard->attempt($credentials);

        if ($token === false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($token === true) {
            return response()->json(['success' => 'Authorized'], 200);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json(['data' => $this->guard->user()]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(string $token)
    {
        /** @var \Tymon\JWTAuth\Factory $factory */
        $factory = $this->guard->factory();
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $factory->getTTL() * 60,
        ];

        return response()->json($data)
            ->header('Authorization', $token);
    }
}
