<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_types';

    protected $fillable = [
        'name',
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

    public function updateContactType(ContactType $contactType, $request)
    {
        $contactType->update($request);

        return $contactType;
    }

    public function deleteContactType($contactTypeId)
    {
        return self::destroy($contactTypeId);
    }
}
