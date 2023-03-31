<?php

namespace App\Repositories;

use App\Models\Userlevel;
use App\Interfaces\UserlevelInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class UserlevelRepository implements UserlevelInterface
{
    public function getAll($request)
    {
        try {
            $userLevels = (new Userlevel)->getAll($request);

            return $userLevels;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $userLevel = (new Userlevel)->getDetail($id);

            return $userLevel;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'      => 'required',
                'is_active' => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new Userlevel)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userLevelId, $request)
    {
        try {
            $userLevel = (new Userlevel)->getDetail($userLevelId);

            $result = (new Userlevel)->updateUserlevel($userLevel, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userLevelId)
    {
        try {
            $result = (new Userlevel)->deleteUserlevel($userLevelId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
