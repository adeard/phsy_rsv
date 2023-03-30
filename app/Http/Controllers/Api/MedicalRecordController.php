<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\MedicalRecordInterface;
use App\Http\Resources\MedicalRecordResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class MedicalRecordController extends Controller
{
    private MedicalRecordInterface $medicalRecordRepository;

    public function __construct(MedicalRecordInterface $medicalRecordRepository)
    {
        $this->medicalRecordRepository = $medicalRecordRepository;
    }

    public function index(Request $request)
    {
        try {
            $medicalRecords = $this->medicalRecordRepository->getAll($request);

            return $this->generateResponse(new MedicalRecordResource("true", '', $medicalRecords));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $medicalRecord = $this->medicalRecordRepository->create($request);

            return $this->generateResponse(new MedicalRecordResource("true", '', $medicalRecord), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $medicalRecordId = $request->route('id');

            $medicalRecord = $this->medicalRecordRepository->getDetail($medicalRecordId);

            return $this->generateResponse(new MedicalRecordResource("true", '', $medicalRecord));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $medicalRecordId = $request->route('id');

            $medicalRecord = $this->medicalRecordRepository->update($medicalRecordId, $request);

            return $this->generateResponse(new MedicalRecordResource("true", '', $medicalRecord));
            $this->statusCode = $medicalRecord->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $medicalRecordId = $request->route('id');

            $medicalRecord = $this->medicalRecordRepository->delete($medicalRecordId);

            return $this->generateResponse(new MedicalRecordResource("true", '', $medicalRecord), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
