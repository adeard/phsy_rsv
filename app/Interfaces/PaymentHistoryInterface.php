<?php

namespace App\Interfaces;

interface PaymentHistoryInterface
{
    public function delete($id);
    public function create($request);
    public function update($id, $request);
    public function getAll($request);
    public function getDetail($id);
}
