<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
