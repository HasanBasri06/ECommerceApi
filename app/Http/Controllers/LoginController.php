<?php

namespace App\Http\Controllers;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\LoginService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ResponseTrait;
    public function __construct(
        private LoginService $loginService
    ) {
        $this->loginService = $loginService;
    }
    public function store(LoginRequest $request) {
        $existUser = $this->loginService->existUser($request->email);

        if (!$existUser) {
            return $this->response(ResponseEnum::ERROR->value, [], 404, 'Kullanıcı hatası.', ['Bu emaile ait kuullanıcı bulunamadı']);
        }

        $user = $this->loginService->getUserDetailByEmail($request->email);
        $verifyPassword = Hash::check($request->password, $user->password);

        if(!$verifyPassword) {
            return $this->response(ResponseEnum::ERROR->value, [], 401, 'Kullanıcı hatası.', ['Şifre yanlış.']);
        }

        Auth::attempt($request->only('email', 'password'));
        $token = $request->user()->createToken('auth');

        return $this->response(
            ResponseEnum::SUCCESS->value,
            [
                'user' => new UserResource($user),
                'token' => $token->plainTextToken
            ],
            200,
            "Kullanıcı başarılı bir şekilde giriş yapıldı.",
            []
        );
    }
}
