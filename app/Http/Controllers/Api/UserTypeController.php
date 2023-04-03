<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserTypeInterface;
use App\Http\Resources\UserTypeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserTypeController extends Controller
{
    private UserTypeInterface $userTypeRepository;

    public function __construct(UserTypeInterface $userTypeRepository)
    {
        $this->userTypeRepository = $userTypeRepository;
    }

    public function index(Request $request)
    {
        try {
            $userTypes = $this->userTypeRepository->getAll($request);

            return $this->generateResponse(new UserTypeResource("true", '', $userTypes));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $userType = $this->userTypeRepository->create($request);

            return $this->generateResponse(new UserTypeResource("true", '', $userType), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $userTypeId = $request->route('id');

            $userType = $this->userTypeRepository->getDetail($userTypeId);

            return $this->generateResponse(new UserTypeResource("true", '', $userType));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $userTypeId = $request->route('id');

            $userType = $this->userTypeRepository->update($userTypeId, $request);

            return $this->generateResponse(new UserTypeResource("true", '', $userType));
            $this->statusCode = $userType->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userTypeId = $request->route('id');

            $userType = $this->userTypeRepository->delete($userTypeId);

            return $this->generateResponse(new UserTypeResource("true", '', $userType), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
