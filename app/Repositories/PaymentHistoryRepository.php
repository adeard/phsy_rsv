<?php

namespace App\Repositories;

use App\Models\PaymentHistory;
use App\Interfaces\PaymentHistoryInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class PaymentHistoryRepository implements PaymentHistoryInterface
{
    public function getAll($request)
    {
        try {
            $paymentHistories = (new PaymentHistory)->getAll($request);

            return $paymentHistories;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $paymentHistory = (new PaymentHistory)->getDetail($id);

            return $paymentHistory;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'   => 'required',
                'payment_id' => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new PaymentHistory)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($paymentHistoryId, $request)
    {
        try {
            $paymentHistory = (new PaymentHistory)->getDetail($paymentHistoryId);

            $result = (new PaymentHistory)->updatePaymentHistory($paymentHistory, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($paymentHistoryId)
    {
        try {
            $result = (new PaymentHistory)->deletePaymentHistory($paymentHistoryId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
