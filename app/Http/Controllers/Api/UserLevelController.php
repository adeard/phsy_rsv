<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserLevelInterface;
use App\Http\Resources\UserLevelResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserLevelController extends Controller
{
    private UserLevelInterface $userLevelRepository;

    public function __construct(UserLevelInterface $userLevelRepository)
    {
        $this->userLevelRepository = $userLevelRepository;
    }

    public function index(Request $request)
    {
        try {
            $userLevels = $this->userLevelRepository->getAll($request);

            return $this->generateResponse(new UserLevelResource("true", '', $userLevels));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $userLevel = $this->userLevelRepository->create($request);

            return $this->generateResponse(new UserLevelResource("true", '', $userLevel), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $userLevelId = $request->route('id');

            $userLevel = $this->userLevelRepository->getDetail($userLevelId);

            return $this->generateResponse(new UserLevelResource("true", '', $userLevel));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $userLevelId = $request->route('id');

            $userLevel = $this->userLevelRepository->update($userLevelId, $request);

            return $this->generateResponse(new UserLevelResource("true", '', $userLevel));
            $this->statusCode = $userLevel->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userLevelId = $request->route('id');

            $userLevel = $this->userLevelRepository->delete($userLevelId);

            return $this->generateResponse(new UserLevelResource("true", '', $userLevel), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
