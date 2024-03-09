<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
<<<<<<< HEAD
        $page = $request->get('page', 1); // get the request page, default is 1
=======
        $page = $request->get('page', 1); // Obtiene la página de la solicitud, por defecto es 1
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        $search = $request->get('search', ''); // Obtiene el término de búsqueda de la solicitud, por defecto es ''

        // Obtiene los usuarios paginados que coinciden con el término de búsqueda y que no son administradores
        $users = User::where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('cedula', 'like', "%{$search}%");
        })
        ->where('admin', 0)
        ->orderBy('created_at', 'desc')
        ->paginate(6, ['*'], 'page', $page);

<<<<<<< HEAD
        // Personaliza la respuesta JSON para que solo incluya los campos necesarios
        $users->getCollection()->transform(function ($user) {
            return $user->only(['id', 'cedula', 'name', 'last_name', 'email', 'phone_number']);
        });
=======
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
        // Retorna los usuarios como una respuesta JSON
        return response()->json($users);
    }
}
