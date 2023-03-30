<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\LocationInterface;
use App\Http\Resources\LocationResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class LocationController extends Controller
{
    private LocationInterface $locationRepository;

    public function __construct(LocationInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function index(Request $request)
    {
        try {
            $locations = $this->locationRepository->getAll($request);

            return $this->generateResponse(new LocationResource("true", '', $locations));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $location = $this->locationRepository->create($request);

            return $this->generateResponse(new LocationResource("true", '', $location), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $locationId = $request->route('id');

            $location = $this->locationRepository->getDetail($locationId);

            return $this->generateResponse(new LocationResource("true", '', $location));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $locationId = $request->route('id');

            $location = $this->locationRepository->update($locationId, $request);

            return $this->generateResponse(new LocationResource("true", '', $location));
            $this->statusCode = $location->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $locationId = $request->route('id');

            $location = $this->locationRepository->delete($locationId);

            return $this->generateResponse(new LocationResource("true", '', $location), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
