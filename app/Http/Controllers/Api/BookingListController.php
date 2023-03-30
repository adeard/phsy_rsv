<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\BookingListInterface;
use App\Http\Resources\BookingListResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception, Response;

class BookingListController extends Controller
{
    private BookingListInterface $bookingListRepository;

    public function __construct(BookingListInterface $bookingListRepository)
    {
        $this->bookingListRepository = $bookingListRepository;
    }

    public function index(Request $request)
    {
        try {
            $roles = $this->bookingListRepository->getAll($request);

            return $this->generateResponse(new BookingListResource("true", '', $roles));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $role = $this->bookingListRepository->create($request);

            return $this->generateResponse(new BookingListResource("true", '', $role), 201);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function show(Request $request)
    {
        try {
            $roleId = $request->route('id');

            $role = $this->bookingListRepository->getDetail($roleId);

            return $this->generateResponse(new BookingListResource("true", '', $role));
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function update(Request $request)
    {
        try {

            $roleId = $request->route('id');

            $role = $this->bookingListRepository->update($roleId, $request);

            return $this->generateResponse(new BookingListResource("true", '', $role));
            $this->statusCode = $role->statusCode;
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }

    public function destroy(Request $request)
    {
        try {

            $roleId = $request->route('id');

            $role = $this->bookingListRepository->delete($roleId);

            return $this->generateResponse(new BookingListResource("true", '', $role), 204);
        } catch (\Throwable $th) {
            return $this->generateErrorResponse($th);
        }
    }
}
