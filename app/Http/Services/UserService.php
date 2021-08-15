<?php
namespace App\Http\Services;

use App\Models\User;

class UserService {

    public function singleData()
    {
        $data = User::find(auth()->user())->first();
        return $data;
    }

    public function register($request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return $user;
    }
}
