<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        // Intentar autenticar utilizando el método authenticate
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            return response(['errors' => $e->errors()], 422);
        }
        // Resto del código para autenticar al usuario y devolver la respuesta
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //identificar que usuario esta haciendo el request
        $user = $request->user();
        //remover el token
        $user->currentAccessToken()->delete();
        return [
            'user' => null
        ];
    }
}
