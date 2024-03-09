<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cedula',
        'name',
        'last_name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //relaciones
    //relación "uno a muchos", indicando que un user puede tener muchos pets.
    //// Obtener todos los pets de un user
    // $user = User::find(1);
    // $pets = $user->pets;
    public function pets()
    {
        return $this->hasMany(Pets::class);
    }
<<<<<<< HEAD
=======
    //relación "uno a muchos", indicando que un user puede tener muchos appointments.
    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
}