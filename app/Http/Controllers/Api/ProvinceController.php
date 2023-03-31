<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\ProvinceInterface;
use App\Http\Resources\ProvinceResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class ProvinceController extends Controller
{
    private ProvinceInterface $provinceRepository;

    public function __construct(ProvinceInterface $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function index(Request $request)
    {
        try {
            $provinces = $this->provinceRepository->getAll($request);

            return $this->generateResponse(new ProvinceResource("true", '', $provinces));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $province = $this->provinceRepository->create($request);

            return $this->generateResponse(new ProvinceResource("true", '', $province), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $provinceId = $request->route('id');

            $province = $this->provinceRepository->getDetail($provinceId);

            return $this->generateResponse(new ProvinceResource("true", '', $province));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $provinceId = $request->route('id');

            $province = $this->provinceRepository->update($provinceId, $request);

            return $this->generateResponse(new ProvinceResource("true", '', $province));
            $this->statusCode = $province->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $provinceId = $request->route('id');

            $province = $this->provinceRepository->delete($provinceId);

            return $this->generateResponse(new ProvinceResource("true", '', $province), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
