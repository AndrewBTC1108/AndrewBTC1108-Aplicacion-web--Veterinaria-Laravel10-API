<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'species',
        'breed',
        'color',
        'sex',
        'user_id'
    ];
<<<<<<< HEAD
    /*
    * a pet can has many Histories
    * $pet = Pet::find($id)
    * $ClinicalHistories = $pet->medical_histories
    */
    public function medical_histories()
    {
        return $this->hasMany(MedicalHistories::class, 'pet_id')->select('id', 'date', 'reasonConsult', 'observations', 'food', 'frequencyFood', 'pet_id');
    }

    public function vaccines()
    {
        return $this->hasMany(Vaccines::class, 'pet_id')->select(['id', 'name', 'date', 'pet_id']);
    }

    public function previous_treatments()
    {
        return $this->hasMany(PreviousTreatment::class, 'pet_id')->select(['id', 'name', 'date', 'pet_id']);
    }

    public function deworming()
    {
        return $this->hasMany(Deworming::class, 'pet_id')->select(['id', 'name', 'date', 'pet_id']);
    }

    public function surgical_procedures()
    {
        return $this->hasMany(SurgicalProcedures::class, 'pet_id')->select(['id', 'name', 'date', 'pet_id']);
    }
=======
    // Obtener el user al que pertenece un pet
    // $pet = Pet::find(1);
    // $user = $pet->users;
    //establece la relación inversa, indicando que un pet pertenece a un user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function appointments()
    // {
    //     return $this->hasMany(Appointments::class, 'pet_id');
    // }
>>>>>>> 7f20fff735029ec9d7cbfda01afde5a4eb380afc
}
