<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\PatientInterface;
use App\Http\Resources\PatientResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class PatientController extends Controller
{
    private PatientInterface $patientRepository;

    public function __construct(PatientInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index(Request $request)
    {
        try {
            $patients = $this->patientRepository->getAll($request);

            return $this->generateResponse(new PatientResource("true", '', $patients));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $patient = $this->patientRepository->create($request);

            return $this->generateResponse(new PatientResource("true", '', $patient), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $patientId = $request->route('id');

            $patient = $this->patientRepository->getDetail($patientId);

            return $this->generateResponse(new PatientResource("true", '', $patient));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $patientId = $request->route('id');

            $patient = $this->patientRepository->update($patientId, $request);

            return $this->generateResponse(new PatientResource("true", '', $patient));
            $this->statusCode = $patient->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $patientId = $request->route('id');

            $patient = $this->patientRepository->delete($patientId);

            return $this->generateResponse(new PatientResource("true", '', $patient), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
