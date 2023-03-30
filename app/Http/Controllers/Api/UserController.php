<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserInterface;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserController extends Controller
{
    private UserInterface $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository   = $userRepository;
    }

    public function index(Request $request)
    {
        try {
            $users = $this->userRepository->getAll($request);

            return $this->generateResponse(new UserResource("true", '', $users));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = $this->userRepository->create($request);

            return $this->generateResponse(new UserResource("true", '', $user), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {

            $userId = $request->route('id');

            $user = $this->userRepository->getDetail($userId);

            return $this->generateResponse(new UserResource("true", '', $user));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $userId = $request->route('id');

            $user = $this->userRepository->update($userId, $request);

            return $this->generateResponse(new UserResource("true", '', $user));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $userId = $request->route('id');

            $user = $this->userRepository->delete($userId);

            return $this->generateResponse(new UserResource("true", '', $user), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
