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

        //select Date
        $date = $request->date;
        // dd($date);
        //use select method to select columns from hours table
        $availableHours = Hours::select('hours.*')
        //use leftJoin method to make an left union  with appointments table
        //and the joining condition and the date condition are specified
        ->leftJoin('appointments as c', function ($join) use ($date) {
            $join->on('hours.id', '=', 'c.hour_id')
                ->where('c.date', '=', $date);
        })
        ->whereNull('c.hour_id')
        ->get();
        //bring the available hours according to the date
        return new HourCollection(new HourResource($availableHours));
    }

    public function pets(Request $request)
    {
        $user_id = auth()->user()->admin ? $request->userId : Auth::user()->id;
        //use whereNotIn to filter out pets whose ID is not present in the subquery result.
        // The subquery selects the pet_id from the appointments table where the user_id matches the current user's ID.
        $availablePets = Pets::where('user_id', $user_id)
            ->whereNotIn('id', function ($query) use ($user_id) {
                $query->select('pet_id')
                    ->from('appointments')
                    ->where('user_id', $user_id)
                    ->where('status', 0); // Filter by pending status
            })
            ->get();
        return new PetsCollection(new PetsResource($availablePets));
    }
}
