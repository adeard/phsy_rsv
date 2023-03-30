<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingList extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_lists';

    protected $fillable = [
        'location_id',
        'user_id',
        'patient_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
    ];

    public function getAll($request)
    {
        return self::get();
    }

    public function getDetail($id)
    {
        return self::find($id);
    }

    public function add($request)
    {
        return self::create($request);
    }

    public function updateBookingList(BookingList $bookingList, $request)
    {
        $bookingList->update($request);

        return $bookingList;
    }

    public function deleteBookingList($bookingListId)
    {
        return self::destroy($bookingListId);
    }
}
