<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AppointmentsResources\HourResource;
use App\Http\Resources\AppointmentsResources\HourCollection;
use App\Http\Resources\AppointmentsResources\PetsResource;
use App\Http\Resources\PetsCollection;
use App\Models\Pets;

class HoursPetsController extends Controller
{
    //
    public function hours(Request $request)
    {
<<<<<<< HEAD
        //select Date
        $date = $request->date;
        // dd($date);
        //use select method to select columns from hours table
        $availableHours = Hours::select('hours.*')
        //use leftJoin method to make an left union  with appointments table
        //and the joining condition and the date condition are specified
=======
        //seleccionamos la fecha
        $date = $request->date;
        // dd($date);
        //Se utiliza el método select para seleccionar las columnas de la tabla hours
        $availableHours = Hours::select('hours.*')
        //Se utiliza el método leftJoin para realizar una unión izquierda con la tabla appointments
        // y se especifica la condición de unión y la condición para la fecha
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        ->leftJoin('appointments as c', function ($join) use ($date) {
            $join->on('hours.id', '=', 'c.hour_id')
                ->where('c.date', '=', $date);
        })
        ->whereNull('c.hour_id')
        ->get();
<<<<<<< HEAD
        //bring the available hours according to the date
        return new HourCollection(new HourResource($availableHours));
    }

    public function pets(Request $request)
    {
        $user_id = auth()->user()->admin ? $request->userId : Auth::user()->id;
        //use whereNotIn to filter out pets whose ID is not present in the subquery result.
        // The subquery selects the pet_id from the appointments table where the user_id matches the current user's ID.
=======
        //traer las horas disponibles segun la fecha
        return new HourCollection(new HourResource($availableHours));
    }

    public function pets()
    {
        $user_id = Auth::user()->id;
        // utilizamos whereNotIn para filtrar las mascotas cuyo ID no está presente en el resultado de la subconsulta.
        // La subconsulta selecciona los mascota_id de la tabla citas donde el user_id coincide con el ID del usuario actual.
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        $availablePets = Pets::where('user_id', $user_id)
            ->whereNotIn('id', function ($query) use ($user_id) {
                $query->select('pet_id')
                    ->from('appointments')
                    ->where('user_id', $user_id)
<<<<<<< HEAD
                    ->where('status', 0); // Filter by pending status
=======
                    ->where('status', 0); // Filtrar por estado pendiente
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
            })
            ->get();
        return new PetsCollection(new PetsResource($availablePets));
    }
}
