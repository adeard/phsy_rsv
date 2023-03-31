<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_levels';

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

    public function updateUserLevel(UserLevel $userLevel, $request)
    {
        $userLevel->update($request);

        return $userLevel;
    }

    public function deleteUserLevel($userLevelId)
    {
        return self::destroy($userLevelId);
    }
}
