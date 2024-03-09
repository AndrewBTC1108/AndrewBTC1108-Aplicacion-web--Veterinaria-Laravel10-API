<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
use App\Models\Appointments;
use App\Http\Resources\AppointmentsCollection;
use App\Traits\AppointmentTrait;
use App\Http\Requests\AppointMents\StoreAppointmentsRequest;
use App\Http\Requests\AppointMents\UpdateAppointmentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
<<<<<<< HEAD
    // we use trait to handle validations of appointments
=======
    //usamos trait para manejar validaciones de appointments
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    use AppointmentTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        $userId = auth()->user()->id;
        $date = $request->date;
        $isAdmin = auth()->user()->admin;

        // If the user is an administrator, all appointments for the given date are displayed.
        // If the user is not an administrator, only the appointments of the authenticated user are shown.
        $query = Appointments::query()
            ->with(['pet', 'hour', 'user'])
            ->where('status', 0);

        if (!$isAdmin) {
            $query->where('user_id', $userId);
        } else if ($date) {
            $query->where('date', $date);
        }

        $appointments = $query->get();

        return new AppointmentsCollection($appointments);
=======
        //verificamos que el usuario sea admin o un usuario normal
        $admin = auth()->user()->admin;
        if(!$admin){
            //se muestran las citas solo del usuario autenticado
            $id = auth()->user()->id;
            $user = User::find($id);
            //nos va a mostrar todas las citas del usuario que esten pendientes
            $userAppointments = $user->appointments()->with(['pet', 'hour', 'user'])->where('status', 0)->get();
            return new AppointmentsCollection($userAppointments);
        }else {
            //seleccionamos la fecha
            $date = $request->date;
            //enves de usar::all() se usa ::whith, hace el llamado a todas las citas que hay en la BD.
            $apointments = Appointments::with(['pet', 'hour', 'user'])->where('status', 0)->where('date', $date)->get();
            return new AppointmentsCollection($apointments);
        }
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentsRequest $request)
    {
<<<<<<< HEAD
        $data = $request->validated();
        $this->authorize('create', Appointments::class);

        $userId = auth()->user()->admin ? $request->user_id : Auth::user()->id;

        if (!$this->checkIfPetBelongsToUser($userId, $data['pet_id'])) {
            return $this->generateErrorResponse('La mascota no pertenece al usuario.', 422);
        }

        if ($this->checkPendigAppointment($data['pet_id'], $userId)) {
            return $this->generateErrorResponse('La mascota tiene una consulta pendiente.', 422);
        }

        if ($this->checkExistingAppointment($data['date'], $data['hour_id'])) {
            return $this->generateErrorResponse('Ya hay una cita programada para la fecha y hora seleccionadas.', 422);
        }

        Appointments::create([
=======
        //Asegurarnos que sea el id del usuario auth, y que llegue un id de las horas
        $data = $request->validated();
        //policie
        $this->authorize('create', Appointments::class);
        //Verificar que la mascota a la que se esta haciendo la consulta sea del usuario
        if (!$this->checkIfPetBelongsToUser(Auth::user()->id, $data['pet_id'])) {
            return $this->generateErrorResponse('La mascota no pertenece al usuario.', 422);
        }
        //verificar si la mascota tiene una consulta ya agendada y esta pendiente
        if($this->checkPendigAppointment($data['pet_id'], Auth::user()->id)){
            return $this->generateErrorResponse('La mascota tiene una consulta pendiente.', 422);
        }
        // Verificar si ya hay una cita para la fecha y hora seleccionadas
        if ($this->checkExistingAppointment($data['date'], $data['hour_id'])) {
            return $this->generateErrorResponse('Ya hay una cita programada para la fecha y hora seleccionadas.', 422);
        }
        //crear cita por medio de relaciones
        $request->user()->appointments()->create([
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
            'pet_id' => $data['pet_id'],
            'date' => $data['date'],
            'hour_id' => $data['hour_id'],
            'reason' => $data['reason'],
<<<<<<< HEAD
            'user_id' => $userId,
            'status' => 0
        ]);

=======
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        return [
            'message' => 'Cita agendada con exito'
        ];
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentsRequest $request, $id)
    {
<<<<<<< HEAD
        //load the appointment
        $appointment = Appointments::findOrFail($id);

        $data = $request->validated();

        $this->authorize('update', $appointment);

        // Check if there is already an appointment for the selected date and time
=======
        //cargar la cita
        $appointment = Appointments::findOrFail($id);

        $this->authorize('update', $appointment);
        //Validar los datos del formulario
        $data = $request->validated();
        // Verificar si ya hay una cita para la fecha y hora seleccionadas
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        if ($this->checkExistingAppointment($data['date'], $data['hour_id'])) {
            return $this->generateErrorResponse('Ya hay una cita programada para la fecha y hora seleccionadas.', 422);
        }

        $appointment->update($data);

        return [
            'message' => 'La cita se ha cambiado',
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
<<<<<<< HEAD
=======
        // Cargar la cita
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        $appointment = Appointments::findOrFail($id);

        $this->authorize('delete', $appointment);

        $appointment->delete();

        return [
            'message' => 'La cita se ha cancelado'
        ];
    }
}
