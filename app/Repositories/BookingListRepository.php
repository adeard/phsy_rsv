<?php

namespace App\Repositories;

use App\Models\BookingList;
use App\Interfaces\BookingListInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class BookingListRepository implements BookingListInterface
{
    public function getAll($request)
    {
        try {
            $bookingLists = (new BookingList)->getAll($request);

            return $bookingLists;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $bookingList = (new BookingList)->getDetail($id);

            return $bookingList;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location_id'   => 'required',
                'user_id'       => 'required',
                'patient_id'    => 'required',
                'start_date'    => 'required',
                'start_time'    => 'required',
                'end_date'      => 'required',
                'end_time'      => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new BookingList)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($bookingListId, $request)
    {
        try {
            $bookingList  = (new BookingList)->getDetail($bookingListId);

            $result = (new BookingList)->updateBookingList($bookingList, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($bookingListId)
    {
        try {
            $result = (new BookingList)->deleteBookingList($bookingListId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
