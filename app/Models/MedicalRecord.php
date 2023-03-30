<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medical_records';

    protected $fillable = [
        'booking_list_id',
        'description',
        'record_date'
    ];

    public function getAll($request)
    {
        return self::get();
    }

    public function getDetail($id)
    {
        return self::find($id);
    }

    public function add($request)
    {
        return self::create($request);
    }

    public function updateMedicalRecord(MedicalRecord $medicalRecord, $request)
    {
        $medicalRecord->update($request);

        return $medicalRecord;
    }

    public function deleteMedicalRecord($medicalRecordId)
    {
        return self::destroy($medicalRecordId);
    }
}
