<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'date',
        'hour_id',
        'reason',
        'user_id',
        'status'
    ];

    //establece la relación inversa, indicando que un appointment pertenece a un user.
    // Obtener el user al que pertenece un appointment
    // $appointment = Appointments::find(1);
    // $user = $appointment->users;
    public function user()
    {
<<<<<<< HEAD
        return $this->belongsTo(User::class)->select(['id', 'name']);
=======
        return $this->belongsTo(User::class);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    }

    public function pet()
    {
<<<<<<< HEAD
        return $this->belongsTo(Pets::class)->select(['id', 'name']);
=======
        return $this->belongsTo(Pets::class);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    }

    public function hour()
    {
<<<<<<< HEAD
        return $this->belongsTo(Hours::class)->select(['id', 'hour']);
=======
        return $this->belongsTo(Hours::class);
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
    }
}
