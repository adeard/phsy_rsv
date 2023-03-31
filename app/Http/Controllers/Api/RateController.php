<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\RateInterface;
use App\Http\Resources\RateResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class RateController extends Controller
{
    private RateInterface $rateRepository;

    public function __construct(RateInterface $rateRepository)
    {
        $this->rateRepository = $rateRepository;
    }

    public function index(Request $request)
    {
        try {
            $rates = $this->rateRepository->getAll($request);

            return $this->generateResponse(new RateResource("true", '', $rates));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $rate = $this->rateRepository->create($request);

            return $this->generateResponse(new RateResource("true", '', $rate), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $rateId = $request->route('id');

            $rate = $this->rateRepository->getDetail($rateId);

            return $this->generateResponse(new RateResource("true", '', $rate));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $rateId = $request->route('id');

            $rate = $this->rateRepository->update($rateId, $request);

            return $this->generateResponse(new RateResource("true", '', $rate));
            $this->statusCode = $rate->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $rateId = $request->route('id');

            $rate = $this->rateRepository->delete($rateId);

            return $this->generateResponse(new RateResource("true", '', $rate), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
