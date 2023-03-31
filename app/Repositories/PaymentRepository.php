<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Interfaces\PaymentInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class PaymentRepository implements PaymentInterface
{
    public function getAll($request)
    {
        try {
            $payments = (new Payment)->getAll($request);

            return $payments;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $payment = (new Payment)->getDetail($id);

            return $payment;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'booking_list_id'   => 'required',
                'payment_status'    => 'required',
                'total_price'       => 'required',
                'payment_date'      => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new Payment)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($paymentId, $request)
    {
        try {
            $payment = (new Payment)->getDetail($paymentId);

            $result = (new Payment)->updatePayment($payment, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($paymentId)
    {
        try {
            $result = (new Payment)->deletePayment($paymentId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
