<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
<<<<<<< HEAD
=======
use App\Http\Resources\AppointmentsResources\HourResource;
use App\Http\Resources\AppointmentsResources\PetsResource;
use App\Http\Resources\AppointmentsResources\UserResource;
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc

class AppointmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    /*
        una forma de transformar los modelos y colecciones de modelos para su serialización JSON.
        se Esta devolviendo un array con los datos que se quieren exponer, y se usa whenLoaded()
        para incluir los recursos relacionados solo cuando ya están cargados
    */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
<<<<<<< HEAD
            'pet_id' => $this->whenLoaded('pet'),
            'date' => $this->date,
            'hour_id' => $this->whenLoaded('hour'),
            'reason' => $this->reason,
            'user_id' => $this->whenLoaded('user')
=======
            'pet_id' => new PetsResource($this->whenLoaded('pet')),
            'date' => $this->date,
            'hour_id' => new HourResource($this->whenLoaded('hour')),
            'reason' => $this->reason,
            'user_id' => new UserResource($this->whenLoaded('user'))
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        ];
    }
}
