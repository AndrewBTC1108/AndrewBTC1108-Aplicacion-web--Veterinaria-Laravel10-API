<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'species' => $this->species,
            'breed' => $this->breed,
            'color' => $this->color,
<<<<<<< HEAD
            'sex' => $this->sex,
            'medical_histories' => $this->whenLoaded('medical_histories'),
            'vaccines' => $this->whenLoaded('vaccines'),
            'previous_treatments' => $this->whenLoaded('previous_treatments'),
            'deworming' => $this->whenLoaded('deworming'),
            'surgical_procedures' => $this->whenLoaded('surgical_procedures')
=======
            'sex' => $this->sex
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        ];
    }
}
