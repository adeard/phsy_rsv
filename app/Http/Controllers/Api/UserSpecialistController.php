<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserSpecialistInterface;
use App\Http\Resources\UserSpecialistResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserSpecialistController extends Controller
{
    private UserSpecialistInterface $userSpecialistRepository;

    public function __construct(UserSpecialistInterface $userSpecialistRepository)
    {
        $this->userSpecialistRepository = $userSpecialistRepository;
    }

    public function index(Request $request)
    {
        try {
            $userSpecialists = $this->userSpecialistRepository->getAll($request);

            return $this->generateResponse(new UserSpecialistResource("true", '', $userSpecialists));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $userSpecialist = $this->userSpecialistRepository->create($request);

            return $this->generateResponse(new UserSpecialistResource("true", '', $userSpecialist), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $userSpecialistId = $request->route('id');

            $userSpecialist = $this->userSpecialistRepository->getDetail($userSpecialistId);

            return $this->generateResponse(new UserSpecialistResource("true", '', $userSpecialist));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $userSpecialistId = $request->route('id');

            $userSpecialist = $this->userSpecialistRepository->update($userSpecialistId, $request);

            return $this->generateResponse(new UserSpecialistResource("true", '', $userSpecialist));
            $this->statusCode = $userSpecialist->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userSpecialistId = $request->route('id');

            $userSpecialist = $this->userSpecialistRepository->delete($userSpecialistId);

            return $this->generateResponse(new UserSpecialistResource("true", '', $userSpecialist), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
