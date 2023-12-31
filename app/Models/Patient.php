<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patient_t";

    protected $primaryKey = "cpUserID";

    public $timestamps = false;


    protected $fillable = [
        'cpUserID',
        'cMedicalHistory',
        'cArea'
    ];

    public function patientSpecs()
    {
        return $this->hasMany(PatientSpec::class);
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }


}
