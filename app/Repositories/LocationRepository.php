<?php

namespace App\Repositories;

use App\Models\Location;
use App\Interfaces\LocationInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class LocationRepository implements LocationInterface
{
    public function getAll($request)
    {
        try {
            $locations = (new Location)->getAll($request);

            return $locations;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $location = (new Location)->getDetail($id);

            return $location;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [ 'name' => 'required' ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new Location)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($locationId, $request)
    {
        try {
            $location  = (new Location)->getDetail($locationId);

            $result = (new Location)->updateLocation($location, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($locationId)
    {
        try {
            $result = (new Location)->deleteLocation($locationId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
