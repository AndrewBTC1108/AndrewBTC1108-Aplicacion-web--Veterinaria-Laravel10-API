<?php

namespace App\Http\Controllers\Auth;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        //
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            event(new Registered($request->user()));
        }
        $request->user()->save();

        return [
            'status' => 'Perfil cambiado Correctamente'
        ];
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
