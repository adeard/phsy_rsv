<?php

namespace App\Repositories;

use App\Models\UserType;
use App\Interfaces\UserTypeInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class UserTypeRepository implements UserTypeInterface
{
    public function getAll($request)
    {
        try {
            $userTypes = (new UserType)->getAll($request);

            return $userTypes;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $userType = (new UserType)->getDetail($id);

            return $userType;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'is_active' => 'required',
                'name'      => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new UserType)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userTypeId, $request)
    {
        try {
            $userType = (new UserType)->getDetail($userTypeId);

            $result = (new UserType)->updateUserType($userType, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userTypeId)
    {
        try {
            $result = (new UserType)->deleteUserType($userTypeId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
