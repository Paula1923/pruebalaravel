<?php

namespace App\Services\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminService {

    public function login($data){
        if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){

            // Remember Admin Email and Password
            if (!empty($data["remember"])) {
                setcookie("email", $data["email"], time() + 3600);
                setcookie("password", $data["password"], time() + 3600);
            } else {
                setcookie("email", "");
                setcookie("password", "");
            }

            $loginStatus = 1;
        } else {
            $loginStatus = 0;
        }

        return $loginStatus;
    }

        public function verifyPassword($data){
            $admin = Auth::guard('admin')->user();

            if (Hash::check($data['current_pwd'], $admin->password)) {
                return response()->json(['valid' => true]);
            } else {
                return response()->json(['valid' => false], 401);
            }
        }

}
