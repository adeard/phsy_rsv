<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\PaymentInterface;
use App\Http\Resources\PaymentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class PaymentController extends Controller
{
    private PaymentInterface $paymentRepository;

    public function __construct(PaymentInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index(Request $request)
    {
        try {
            $payments = $this->paymentRepository->getAll($request);

            return $this->generateResponse(new PaymentResource("true", '', $payments));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $payment = $this->paymentRepository->create($request);

            return $this->generateResponse(new PaymentResource("true", '', $payment), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $paymentId = $request->route('id');

            $payment = $this->paymentRepository->getDetail($paymentId);

            return $this->generateResponse(new PaymentResource("true", '', $payment));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $paymentId = $request->route('id');

            $payment = $this->paymentRepository->update($paymentId, $request);

            return $this->generateResponse(new PaymentResource("true", '', $payment));
            $this->statusCode = $payment->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $paymentId = $request->route('id');

            $payment = $this->paymentRepository->delete($paymentId);

            return $this->generateResponse(new PaymentResource("true", '', $payment), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
