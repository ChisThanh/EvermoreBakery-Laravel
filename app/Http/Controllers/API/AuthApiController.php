<?php

namespace App\Http\Controllers\API;

use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthApiController extends BaseApiController
{
    protected $service;

    public function __construct(
        UserService $service
    ) {
        $this->service = $service;
    }

    public function login(Request $request)
    {
        try {
            $credentials = $this->validateRequest($request, true);
            if (auth()->attempt($credentials))
                $this->makeResponse("Unauthorized", 401);

            $user = auth()->user();
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            // Thiết Lập Quyền Hạn Cho Token
            // $token = $user->createToken('Admin Token', ['create', 'view', 'delete'])->plainTextToken;

            return $this->makeResponse(fields: ['access_token' => $tokenResult]);
        } catch (ValidationException $error) {
            return $this->makeResponse($error->getMessage(), 500);
        } catch (\Exception $error) {
            return $this->makeResponse('Error in Login', 500);
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->currentAccessToken()->delete();
        return $this->makeResponse('Logged out successfully');
    }

    public function register(Request $request)
    {
        try {
            $data = $this->validateRequest($request);
            $user = $this->service->create($data);
            return $this->makeResponse(data: $user);
        } catch (ValidationException $error) {
            return $this->makeResponse($error->getMessage(), 500);
        } catch (\Exception $error) {
            return $this->makeResponse('Error in Register', 500);
        }
    }

    public function refresh(Request $request)
    {
        $user = $request->user();
        if (!$user)
            return $this->makeResponse('Unauthorized', 401);
        $request->user()->currentAccessToken()->delete();
        $newToken = $user->createToken('authToken')->plainTextToken;
        return $this->makeResponse(fields: ['access_token' => $newToken]);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        if (!$user)
            return $this->makeResponse('Unauthorized', 401);
        return $this->makeResponse(data: $user);
    }
    public function validateToken(Request $request)
    {
        $user = $request->user();
        if (!$user)
            return $this->makeResponse('Unauthorized', 401);
        return $this->makeResponse('Authorized');
    }

    public function validateRequest(Request $request, $isLogin = false): array
    {
        $array = [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
        ];
        if ($isLogin)
            unset($array['name']);
        else
            $array['email'] .= '|unique:users';

        $validated = $request->validate($array);
        if (!$isLogin)
            $validated['password'] = bcrypt($validated['password']);

        return $validated;
    }
}