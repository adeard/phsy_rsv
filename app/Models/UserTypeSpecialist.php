<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTypeSpecialist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_type_specialists';

    protected $fillable = [
        'user_type_id',
        'name'
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

    public function updateUserTypeSpecialist(UserTypeSpecialist $userTypeSpecialist, $request)
    {
        $userTypeSpecialist->update($request);

        return $userTypeSpecialist;
    }

    public function deleteUserTypeSpecialist($userTypeSpecialistId)
    {
        return self::destroy($userTypeSpecialistId);
    }
}
