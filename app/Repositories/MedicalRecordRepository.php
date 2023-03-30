<?php

namespace App\Repositories;

use App\Models\MedicalRecord;
use App\Interfaces\MedicalRecordInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class MedicalRecordRepository implements MedicalRecordInterface
{
    public function getAll($request)
    {
        try {
            $medicalRecords = (new MedicalRecord)->getAll($request);

            return $medicalRecords;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $medicalRecord = (new MedicalRecord)->getDetail($id);

            return $medicalRecord;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'booking_list_id'   => 'required',
                'description'       => 'required',
                'record_date'       => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new MedicalRecord)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($medicalRecordId, $request)
    {
        try {
            $medicalRecord  = (new MedicalRecord)->getDetail($medicalRecordId);

            $result = (new MedicalRecord)->updateMedicalRecord($medicalRecord, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($medicalRecordId)
    {
        try {
            $result = (new MedicalRecord)->deleteMedicalRecord($medicalRecordId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
