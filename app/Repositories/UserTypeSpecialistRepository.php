<?php

namespace App\Repositories;

use App\Models\UserTypeSpecialist;
use App\Interfaces\UserTypeSpecialistInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class UserTypeSpecialistRepository implements UserTypeSpecialistInterface
{
    public function getAll($request)
    {
        try {
            $userTypeSpecialists = (new UserTypeSpecialist)->getAll($request);

            return $userTypeSpecialists;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $userTypeSpecialist = (new UserTypeSpecialist)->getDetail($id);

            return $userTypeSpecialist;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_type_id'  => 'required',
                'name'          => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new UserTypeSpecialist)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userTypeSpecialistId, $request)
    {
        try {
            $userTypeSpecialist = (new UserTypeSpecialist)->getDetail($userTypeSpecialistId);

            $result = (new UserTypeSpecialist)->updateUserTypeSpecialist($userTypeSpecialist, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userTypeSpecialistId)
    {
        try {
            $result = (new UserTypeSpecialist)->deleteUserTypeSpecialist($userTypeSpecialistId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
