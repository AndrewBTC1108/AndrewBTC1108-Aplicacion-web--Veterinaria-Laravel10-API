<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\User;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PetsCollection;
use App\Http\Requests\StorePetsRequest;
use App\Http\Requests\UpdatePetsRequest;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
<<<<<<< HEAD
    public function index(Request $request)
    {

        $userId = auth()->user()->admin ? $request->user_id : Auth::user()->id;
        $user = User::find($userId);
        //when we need a collection of something like pets, users or appointments, if we need only one element, use resources
        return new PetsCollection($user->pets);
=======
    public function index()
    {
        //obtener el id del usuario autenticado
        $id = Auth::user()->id;
        $user = User::find($id);
        //obtener las Mascotas del usuario Autenticado
        $pets = $user->pets;
        return new PetsCollection($pets);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetsRequest $request)
    {
        $this->authorize('create', Pets::class);
        $data = $request->validated();
<<<<<<< HEAD

        $userId = auth()->user()->admin ? $request->user_id : Auth::user()->id;

        Pets::create([
=======
        //crear mascota por medio de relaciones
        $request->user()->pets()->create([
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
            'species' => $data['species'],
            'breed' => $data['breed'],
            'color' => $data['color'],
            'sex' => $data['sex'],
<<<<<<< HEAD
            'user_id' => $userId
        ]);

=======
            'user_id' => auth()->user()->id
        ]);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        return [
            'message' => 'Mascota creada con exito'
        ];
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetsRequest $request, $id)
    {

<<<<<<< HEAD
        // load pet
        $pets = Pets::findOrFail($id);
        //authorization pilicie
        $this->authorize('update', $pets);
        //validate the form data
=======
        // Cargar la mascota
        $pets = Pets::findOrFail($id);
        //policie de autorizacion
        $this->authorize('update', $pets);
        // Validar los datos del formulario
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        $data = $request->validated();

        $pets->update($data);

        return [
            'message' => 'La mascota se ha actualizado',
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $pets = Pets::findOrFail($id);

        $this->authorize('delete', $pets);
        // Delete pet of DB
=======
        // Cargar la mascota
        $pets = Pets::findOrFail($id);
        //policie de autorizacion
        $this->authorize('delete', $pets);
        // Eliminar la mascota de la base de datos
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        $pets->delete();

        return [
            'message' => 'La mascota se ha eliminado'
        ];
    }
}
