<?php

namespace App\Repositories;

use App\Models\Rate;
use App\Interfaces\RateInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class RateRepository implements RateInterface
{
    public function getAll($request)
    {
        try {
            $rates = (new Rate)->getAll($request);

            return $rates;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $rate = (new Rate)->getDetail($id);

            return $rate;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'   => 'required',
                'rates'     => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new Rate)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($rateId, $request)
    {
        try {
            $rate = (new Rate)->getDetail($rateId);

            $result = (new Rate)->updateRate($rate, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($rateId)
    {
        try {
            $result = (new Rate)->deleteRate($rateId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
