<?php

namespace App\Repositories;

use App\Models\Province;
use App\Interfaces\ProvinceInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class ProvinceRepository implements ProvinceInterface
{
    public function getAll($request)
    {
        try {
            $provinces = (new Province)->getAll($request);

            return $provinces;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $province = (new Province)->getDetail($id);

            return $province;
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

            return (new Province)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($provinceId, $request)
    {
        try {
            $province = (new Province)->getDetail($provinceId);

            $result = (new Province)->updateProvince($province, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($provinceId)
    {
        try {
            $result = (new Province)->deleteProvince($provinceId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
