<?php

namespace App\Repositories;

use App\Models\City;
use App\Interfaces\CityInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class CityRepository implements CityInterface
{
    public function getAll($request)
    {
        try {
            $cities = (new City)->getAll($request);

            return $cities;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $city = (new City)->getDetail($id);

            return $city;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'province_id'   => 'required',
                'name'          => 'required',
                'is_active'     => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new City)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($cityId, $request)
    {
        try {
            $city  = (new City)->getDetail($cityId);

            $result = (new City)->updateCity($city, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($cityId)
    {
        try {
            $result = (new City)->deleteCity($cityId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
