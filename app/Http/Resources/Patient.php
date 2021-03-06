<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Patient extends JsonResource
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
            'id ' => $this->id,
            'national_id' => $this->national_id,
            'name' => $this->name,
            // 'password'=>$this->password,
            'phoneNumber' => $this->phone_number,
            'address' => $this->address,
            'arriving_date' => $this->arriving_date,
            'gender' => $this->gender,


            'api_token' => $this->api_token,
            'birth_date' => $this->birth_date,
            'age' => $this->age,
            'height' => $this->height,
            'weight' => $this->weight,
            // 'bloodType'=>$this->bloodType,
            // 'profile_photo_path'=>$this->profile_photo_path,
            // 'diseases'=>$this->diseases,
            // 'medicines'=>$this->medicines,
            // 'statues'=>$this->statues,
            // 'hospital_name'=>$this->hospital_name,
            // 'created_at'=>$this->created_at,
            // 'updated_at'=>$this->updated_at
        ];
    }
}
