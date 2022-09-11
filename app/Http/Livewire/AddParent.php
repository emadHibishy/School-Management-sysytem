<?php

namespace App\Http\Livewire;

use App\Models\Helpers\BloodType;
use App\Models\Helpers\Nationality;
use App\Models\Helpers\Religion;
use Livewire\Component;

class AddParent extends Component
{

    public $currentStep = 1,
        $email,
        $prev,
        $next,
        $password,
        $ar_father_name,
        $en_father_name,
        $en_father_job,
        $ar_father_job,
        $father_national_id,
        $father_passport_id,
        $father_phone,
        $father_nationality,
        $father_blood_type,
        $father_religion,
        $father_address,
        $ar_mother_name,
        $en_mother_name,
        $en_mother_job,
        $ar_mother_job,
        $mother_national_id,
        $mother_passport_id,
        $mother_phone,
        $mother_nationality,
        $mother_blood_type,
        $mother_religion,
        $mother_address;

    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => Nationality::all(),
            'blood_types' => BloodType::all(),
            'religions' => Religion::all()
        ]);
    }

    public function next()
    {
        $this->currentStep++;
    }

    public function prev()
    {
        $this->currentStep--;
    }
}
