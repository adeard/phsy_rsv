<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\CityInterface;
use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class CityController extends Controller
{
    private CityInterface $cityRepository;

    public function __construct(CityInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(Request $request)
    {
        try {
            $cities = $this->cityRepository->getAll($request);

            return $this->generateResponse(new CityResource("true", '', $cities));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $city = $this->cityRepository->create($request);

            return $this->generateResponse(new CityResource("true", '', $city), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $cityId = $request->route('id');

            $city = $this->cityRepository->getDetail($cityId);

            return $this->generateResponse(new CityResource("true", '', $city));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $cityId = $request->route('id');

            $city = $this->cityRepository->update($cityId, $request);

            return $this->generateResponse(new CityResource("true", '', $city));
            $this->statusCode = $city->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $cityId = $request->route('id');

            $city = $this->cityRepository->delete($cityId);

            return $this->generateResponse(new CityResource("true", '', $city), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
