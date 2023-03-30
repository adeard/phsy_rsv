<?php

namespace App\Repositories;

use App\Models\ContactType;
use App\Interfaces\ContactTypeInterface;
use Illuminate\Support\Facades\Validator;
use Exception, Auth;

class ContactTypeRepository implements ContactTypeInterface
{
    public function getAll($request)
    {
        try {
            $contactTypes = (new ContactType)->getAll($request);

            return $contactTypes;
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function getDetail($id)
    {
        try {
            $contactType = (new ContactType)->getDetail($id);

            return $contactType;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function create($request)
    {
        try {
            $validator = Validator::make($request->all(), [ 'name' => 'required' ]);

            if ($validator->fails()) { throw new Exception($validator->errors(), 422); }

            return (new ContactType)->add($request->all());

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update($contactTypeId, $request)
    {
        try {
            $contactType  = (new ContactType)->getDetail($contactTypeId);

            $result = (new ContactType)->updateContactType($contactType, $request->all());

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function delete($contactTypeId)
    {
        try {
            $result = (new ContactType)->deleteContactType($contactTypeId);

            return $result;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }
    }
}
