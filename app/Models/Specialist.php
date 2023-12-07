<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $table = "specialist_t"   ;
    public $timestamps = False;

    protected $fillable = [
        'csUserID',
        'cExperience',
        'cOff_Address',
        'cType',
    ];

    public function specsPat()
    {
        return $this->hasMany(PatientSpec::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function therapist()
        {
            return $this->hasMany(Therapist::class);
        }

        public function specialist()
        {
            return $this->hasMany(Specialist::class);
        }
}
