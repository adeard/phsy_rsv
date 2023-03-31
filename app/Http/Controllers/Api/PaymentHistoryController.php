<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\PaymentHistoryInterface;
use App\Http\Resources\PaymentHistoryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class PaymentHistoryController extends Controller
{
    private PaymentHistoryInterface $paymentHistoryRepository;

    public function __construct(PaymentHistoryInterface $paymentHistoryRepository)
    {
        $this->paymentHistoryRepository = $paymentHistoryRepository;
    }

    public function index(Request $request)
    {
        try {
            $paymentHistories = $this->paymentHistoryRepository->getAll($request);

            return $this->generateResponse(new PaymentHistoryResource("true", '', $paymentHistories));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $paymentHistory = $this->paymentHistoryRepository->create($request);

            return $this->generateResponse(new PaymentHistoryResource("true", '', $paymentHistory), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $paymentHistoryId = $request->route('id');

            $paymentHistory = $this->paymentHistoryRepository->getDetail($paymentHistoryId);

            return $this->generateResponse(new PaymentHistoryResource("true", '', $paymentHistory));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $paymentHistoryId = $request->route('id');

            $paymentHistory = $this->paymentHistoryRepository->update($paymentHistoryId, $request);

            return $this->generateResponse(new PaymentHistoryResource("true", '', $paymentHistory));
            $this->statusCode = $paymentHistory->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $paymentHistoryId = $request->route('id');

            $paymentHistory = $this->paymentHistoryRepository->delete($paymentHistoryId);

            return $this->generateResponse(new PaymentHistoryResource("true", '', $paymentHistory), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
