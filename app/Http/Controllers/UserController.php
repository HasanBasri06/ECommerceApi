<?php

namespace App\Http\Controllers;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ResponseTrait;
    public function getAuthUser(Request $request) {
        if ($request->user()) {
            return $this->response(ResponseEnum::SUCCESS->value, ["user" => $request->user()], 200, 'Auth kullanıcı', []);
        }

        return $this->response(ResponseEnum::INFO->value, [], 404, 'Auth olan kullanıcı yok', []);
    }
}
