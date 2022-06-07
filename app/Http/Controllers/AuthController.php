<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * Registration
     */
    public function register(RegisterRequest $request)
    {

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $data['name'] =  $user->name;
        $data['token'] = $user->createToken('YengecAuth')->accessToken;
        return $this->sendResponse($data,'Kullanıcı başarıyla kaydedildi');
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('YengecAuth')-> accessToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'Kullanıcı girişi başarılı.');
        } else {
            return $this->sendError('Unauthorised.', ['error'=>'Yetkisiz']);
        }
    }
}
