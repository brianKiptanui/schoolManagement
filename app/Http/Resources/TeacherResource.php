<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'pwd' => $this->pwd,
            'subject' => $this->subject,
            'role' => $this->role,
            'tsc_no' => $this->tsc_no,
        ];
    }
}
