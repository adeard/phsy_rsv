<?php

namespace App\Repositories;

use App\Models\UserContact;
use App\Interfaces\UserContactInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class UserContactRepository implements UserContactInterface
{
    public function getAll($request)
    {
        try {
            $userContacts = (new UserContact)->getAll($request);

            return $userContacts;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $userContact = (new UserContact)->getDetail($id);

            return $userContact;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'contact_type_id'   => 'required',
                'user_id'           => 'required',
                'contact'           => 'required',
                'is_active'         => 'required',
            ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new UserContact)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($userContactId, $request)
    {
        try {
            $userContact = (new UserContact)->getDetail($userContactId);

            $result = (new UserContact)->updateUserContact($userContact, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($userContactId)
    {
        try {
            $result = (new UserContact)->deleteUserContact($userContactId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
