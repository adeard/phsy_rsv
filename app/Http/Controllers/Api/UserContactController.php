<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\UserContactInterface;
use App\Http\Resources\UserContactResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class UserContactController extends Controller
{
    private UserContactInterface $userContactRepository;

    public function __construct(UserContactInterface $userContactRepository)
    {
        $this->userContactRepository = $userContactRepository;
    }

    public function index(Request $request)
    {
        try {
            $userContacts = $this->userContactRepository->getAll($request);

            return $this->generateResponse(new UserContactResource("true", '', $userContacts));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $userContact = $this->userContactRepository->create($request);

            return $this->generateResponse(new UserContactResource("true", '', $userContact), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $userContactId = $request->route('id');

            $userContact = $this->userContactRepository->getDetail($userContactId);

            return $this->generateResponse(new UserContactResource("true", '', $userContact));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $userContactId = $request->route('id');

            $userContact = $this->userContactRepository->update($userContactId, $request);

            return $this->generateResponse(new UserContactResource("true", '', $userContact));
            $this->statusCode = $userContact->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userContactId = $request->route('id');

            $userContact = $this->userContactRepository->delete($userContactId);

            return $this->generateResponse(new UserContactResource("true", '', $userContact), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
