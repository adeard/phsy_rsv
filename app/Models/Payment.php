<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'booking_list_id',
        'payment_status',
        'total_price',
        'payment_date',
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

    public function updatePayment(Payment $payment, $request)
    {
        $payment->update($request);

        return $payment;
    }

    public function deletePayment($paymentId)
    {
        return self::destroy($paymentId);
    }
}
