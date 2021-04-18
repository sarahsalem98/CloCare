<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
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
            'id'=>$this->id,
            'national_id'=>$this->national_id,
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'profile_photo_path'=>$this->profile_photo_path,
            'specialization'=>$this->specialization,
            'work_at'=>$this->work_at,
            'api_token'=>$this->api_token,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
