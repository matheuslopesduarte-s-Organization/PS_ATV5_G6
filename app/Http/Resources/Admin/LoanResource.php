<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'book' => new BookResource($this->book),
            'user' => new UsersResource($this->user),
            'loan_date' => $this->loan_date,
            'return_date' => $this->return_date,
            'return_deadline' => $this->return_deadline,
        ];
    }
}
