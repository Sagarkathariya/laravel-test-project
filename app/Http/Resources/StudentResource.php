<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'full_name'     => $this->full_name,
            'phone_number'  => $this->phone_number,
            'email'         => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'address'       => $this->address,
            'status'        => $this->status,
            'course'        => $this->course
        ];
    }
    public function with(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'Student data retrieved successfully.',
        ];
    }
}
