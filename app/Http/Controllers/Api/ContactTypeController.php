<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\ContactTypeInterface;
use App\Http\Resources\ContactTypeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class ContactTypeController extends Controller
{
    private ContactTypeInterface $contactTypeRepository;

    public function __construct(ContactTypeInterface $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    public function index(Request $request)
    {
        try {
            $roles = $this->contactTypeRepository->getAll($request);

            return $this->generateResponse(new ContactTypeResource("true", '', $roles));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $role = $this->contactTypeRepository->create($request);

            return $this->generateResponse(new ContactTypeResource("true", '', $role), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $roleId = $request->route('id');

            $role = $this->contactTypeRepository->getDetail($roleId);

            return $this->generateResponse(new ContactTypeResource("true", '', $role));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $roleId = $request->route('id');

            $role = $this->contactTypeRepository->update($roleId, $request);

            return $this->generateResponse(new ContactTypeResource("true", '', $role));
            $this->statusCode = $role->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $roleId = $request->route('id');

            $role = $this->contactTypeRepository->delete($roleId);

            return $this->generateResponse(new ContactTypeResource("true", '', $role), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
