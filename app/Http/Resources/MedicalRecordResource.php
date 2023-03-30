<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordResource extends JsonResource
{
    public $data;
    public $status;
    public $message;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $message, $data)
    {
        parent::__construct($data);
        $this->data         = !empty($data) ? $data : '';
        $this->status       = !empty($status) ? $status : '';
        $this->message      = !empty($message) ? $message : '';
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status'        => $this->status,
            'error_msg'     => $this->message,
            'data'          => $this->data,
        ];
    }
}
