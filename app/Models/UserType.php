<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_types';

    protected $fillable = [
        'name',
        'is_active'
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

    public function updateUserType(UserType $userType, $request)
    {
        $userType->update($request);

        return $userType;
    }

    public function deleteUserType($userTypeId)
    {
        return self::destroy($userTypeId);
    }
}
