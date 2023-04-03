<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSpecialist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_specialists';

    protected $fillable = [
        'user_id',
        'user_type_specialist_id'
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

    public function updateUserSpecialist(UserSpecialist $userSpecialist, $request)
    {
        $userSpecialist->update($request);

        return $userSpecialist;
    }

    public function deleteUserSpecialist($userSpecialistId)
    {
        return self::destroy($userSpecialistId);
    }
}
