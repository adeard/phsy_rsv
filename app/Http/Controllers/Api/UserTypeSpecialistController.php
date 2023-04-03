<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserTypeSpecialistInterface;
use App\Http\Resources\UserTypeSpecialistResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserTypeSpecialistController extends Controller
{
    private UserTypeSpecialistInterface $userTypeSpecialistRepository;

    public function __construct(UserTypeSpecialistInterface $userTypeSpecialistRepository)
    {
        $this->userTypeSpecialistRepository = $userTypeSpecialistRepository;
    }

    public function index(Request $request)
    {
        try {
            $userTypeSpecialists = $this->userTypeSpecialistRepository->getAll($request);

            return $this->generateResponse(new UserTypeSpecialistResource("true", '', $userTypeSpecialists));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $userTypeSpecialist = $this->userTypeSpecialistRepository->create($request);

            return $this->generateResponse(new UserTypeSpecialistResource("true", '', $userTypeSpecialist), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $userTypeSpecialistId = $request->route('id');

            $userTypeSpecialist = $this->userTypeSpecialistRepository->getDetail($userTypeSpecialistId);

            return $this->generateResponse(new UserTypeSpecialistResource("true", '', $userTypeSpecialist));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $userTypeSpecialistId = $request->route('id');

            $userTypeSpecialist = $this->userTypeSpecialistRepository->update($userTypeSpecialistId, $request);

            return $this->generateResponse(new UserTypeSpecialistResource("true", '', $userTypeSpecialist));
            $this->statusCode = $userTypeSpecialist->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userTypeSpecialistId = $request->route('id');

            $userTypeSpecialist = $this->userTypeSpecialistRepository->delete($userTypeSpecialistId);

            return $this->generateResponse(new UserTypeSpecialistResource("true", '', $userTypeSpecialist), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
