<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Interfaces\PatientInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class PatientRepository implements PatientInterface
{
    public function getAll($request)
    {
        try {
            $patients = (new Patient)->getAll($request);

            return $patients;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $patient = (new Patient)->getDetail($id);

            return $patient;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'   => 'required',
                'is_active' => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new Patient)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($patientId, $request)
    {
        try {
            $patient  = (new Patient)->getDetail($patientId);

            $result = (new Patient)->updatePatient($patient, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($patientId)
    {
        try {
            $result = (new Patient)->deletePatient($patientId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
