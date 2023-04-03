<?php

namespace App\Repositories;

use App\Models\UserSpecialist;
use App\Interfaces\UserSpecialistInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class UserSpecialistRepository implements UserSpecialistInterface
{
    public function getAll($request)
    {
        try {
            $userSpecialists = (new UserSpecialist)->getAll($request);

            return $userSpecialists;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $userSpecialist = (new UserSpecialist)->getDetail($id);

            return $userSpecialist;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'                   => 'required',
                'user_type_specialist_id'   => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new UserSpecialist)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userSpecialistId, $request)
    {
        try {
            $userSpecialist = (new UserSpecialist)->getDetail($userSpecialistId);

            $result = (new UserSpecialist)->updateUserSpecialist($userSpecialist, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userSpecialistId)
    {
        try {
            $result = (new UserSpecialist)->deleteUserSpecialist($userSpecialistId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
