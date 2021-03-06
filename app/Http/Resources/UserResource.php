<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\DepartmentResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name, 
            "emails" => EmailResource::collection($this->emails), 
            "departments" => DepartmentResource::collection($this->departments),                
        ];
    }
}
