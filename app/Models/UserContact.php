<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_contacts';

    protected $fillable = [
        'contact_type_id',
        'user_id',
        'contact',
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

    public function updateUserContact(UserContact $userContact, $request)
    {
        $userContact->update($request);

        return $userContact;
    }

    public function deleteUserContact($userContactId)
    {
        return self::destroy($userContactId);
    }
}
