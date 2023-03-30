<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserRepository implements UserInterface
{
    public function getAll($request)
    {
        try {
            $users = (new User)->getAll($request);

            return $users;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $user = (new User)->getDetail($id);

            return $user;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_type_id'  => 'required',
                'user_level_id' => 'required',
                'name'          => 'required',
                'email'         => 'required|email|unique:users',
                'password'      => 'required|min:8|confirmed',
                'address'       => 'required',
                'img_profile'   => 'required',
                'gender'        => 'required',
                'birth_date'    => 'required',
                'is_active'     => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            $user = (new User)->add($request);

            return $user;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function login($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'     => 'required',
                'password'  => 'required'
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            $credentials = $request->only('email', 'password');

            if(!$token = auth()->guard('api')->attempt($credentials)) { throw new Exception('Email atau Password Anda salah', 401); }

            $result = [
                'user'    => auth()->guard('api')->user(),
                'token'   => $token
            ];

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userId, $request)
    {
        try {
            $user  = (new User)->getDetail($userId);

            $result = (new User)->updateUser($user, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userId)
    {
        try {
            $result = (new User)->deleteUser($userId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
