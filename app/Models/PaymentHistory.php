<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payment_histories';

    protected $fillable = [
        'user_id',
        'payment_id',
        'description'
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

    public function updatePaymentHistory(PaymentHistory $paymentHistory, $request)
    {
        $paymentHistory->update($request);

        return $paymentHistory;
    }

    public function deletePaymentHistory($paymentHistoryId)
    {
        return self::destroy($paymentHistoryId);
    }
}
