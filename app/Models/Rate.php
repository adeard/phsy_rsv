<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rates';

    protected $fillable = [
        'user_id',
        'rates',
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

    public function updateRate(Rate $rate, $request)
    {
        $rate->update($request);

        return $rate;
    }

    public function deleteRate($rateId)
    {
        return self::destroy($rateId);
    }
}
