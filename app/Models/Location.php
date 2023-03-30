<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'locations';

    protected $fillable = [
        'name',
        'city_id',
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

    public function updateLocation(Location $location, $request)
    {
        $location->update($request);

        return $location;
    }

    public function deleteLocation($locationId)
    {
        return self::destroy($locationId);
    }
}
