<?php

namespace App\Http\Livewire;

use App\Models\Attachement;
use App\Models\Helpers\BloodType;
use App\Models\Helpers\Nationality;
use App\Models\Helpers\Religion;
use App\Models\Parents;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Type\Integer;

class AddParent extends Component
{
    use WithFileUploads;

    public
        $currentStep = 1,
        $show_table = true,
        $update_mode = false,
        $photos = [],
//        $parent,
        $parent_id,
        $Error,
        $email,
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

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
        'father_national_id' => 'required|numeric|digits:10',
        'father_passport_id' => 'required|numeric|digits:10',
        'father_phone' => 'required|numeric|digits:11',
        'mother_national_id' => 'required|numeric|digits:10',
        'mother_passport_id' => 'required|numeric|digits:10',
        'mother_phone' => 'required|numeric|digits:11',
    ];

//    protected $messages = [
//        'Email.required' => trans('parents.test'),
//        'Email.email' => 'The Email Address format is not valid.',
//    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => Nationality::all(),
            'blood_types' => BloodType::all(),
            'religions' => Religion::all(),
            'parents' => Parents::all()
        ]);
    }

    public function next()
    {
        if($this->currentStep == 1){
            $this->validate([
                'email' => 'required|email|unique:parents,email,'. $this->parent_id,
                'password' => 'required|min:8',
                'ar_father_name' => 'required',
                'en_father_name' => 'required',
                'ar_father_job' => 'required',
                'en_father_job' => 'required',
                'father_national_id' => 'required|numeric|digits:10|unique:parents,father_national_id,'. $this->parent_id,
                'father_passport_id' => 'required|numeric|digits:10|unique:parents,father_passport_id,'. $this->parent_id,
                'father_phone' => 'required|numeric|digits:11|unique:parents,father_phone,'. $this->parent_id,
                'father_nationality' => 'required',
                'father_blood_type' => 'required',
                'father_religion' => 'required',
                'father_address' => 'required',
            ]);
        }elseif ($this->currentStep == 2){
            $this->validate([
                'ar_mother_name' => 'required',
                'en_mother_name' => 'required',
                'ar_mother_job' => 'required',
                'en_mother_job' => 'required',
                'mother_national_id' => 'required|numeric|digits:10|unique:parents,mother_national_id,'. $this->parent_id,
                'mother_passport_id' => 'required|numeric|digits:10|unique:parents,mother_passport_id,'. $this->parent_id,
                'mother_phone' => 'required|numeric|digits:11|unique:parents,mother_phone,'. $this->parent_id,
                'mother_nationality' => 'required',
                'mother_blood_type' => 'required',
                'mother_religion' => 'required',
                'mother_address' => 'required',
            ]);
        }
        $this->currentStep++;
    }

    public function prev()
    {
        if ($this->currentStep == 2){
            $this->validate([
                'ar_mother_name' => 'required',
                'en_mother_name' => 'required',
                'ar_mother_job' => 'required',
                'en_mother_job' => 'required',
                'mother_national_id' => 'required|numeric|digits:10|unique:parents,mother_national_id,'. $this->parent_id,
                'mother_passport_id' => 'required|numeric|digits:10|unique:parents,mother_passport_id,'. $this->parent_id,
                'mother_phone' => 'required|numeric|digits:11|unique:parents,mother_phone,'. $this->parent_id,
                'mother_nationality' => 'required',
                'mother_blood_type' => 'required',
                'mother_religion' => 'required',
                'mother_address' => 'required',
            ]);
        }
        $this->currentStep--;
    }

    public function submitForm(FlasherInterface $flasher)
    {
        try {
            $parent = new Parents();

            $parent->email = $this->email;
            $parent->password = Hash::make($this->password);

            //father variables
            $parent->father_name = ['ar' => $this->ar_father_name , 'en' => $this->en_father_name];
            $parent->father_job = ['ar' => $this->ar_father_job , 'en' => $this->en_father_job];
            $parent->father_national_id = $this->father_national_id;
            $parent->father_passport_id = $this->father_passport_id;
            $parent->father_phone = $this->father_phone;
            $parent->father_nationality_id = $this->father_nationality;
            $parent->father_blood_type_id = $this->father_blood_type;
            $parent->father_religion_id = $this->father_religion;
            $parent->father_address = $this->father_address;

            //mother variables
            $parent->mother_name = ['ar' => $this->ar_mother_name , 'en' => $this->en_mother_name];
            $parent->mother_job = ['ar' => $this->ar_mother_job , 'en' => $this->en_mother_job];
            $parent->mother_national_id = $this->mother_national_id;
            $parent->mother_passport_id = $this->mother_passport_id;
            $parent->mother_phone = $this->mother_phone;
            $parent->mother_nationality_id = $this->mother_nationality;
            $parent->mother_blood_type_id = $this->mother_blood_type;
            $parent->mother_religion_id = $this->mother_religion;
            $parent->mother_address = $this->mother_address;

            $parent->save();

            if(!empty($this->photos)){
                foreach ( $this->photos as $photo){
                    $photo->storeAs($this->father_national_id , $photo->getClientOriginalName(), $disk = 'parents');
                    Attachement::create([
                        'url' => $photo->getClientOriginalName(),
                        'attachmentable_id' => Parents::latest()->first()->id,
                        'attachementable_type' => 'App\\Models\\Parents'
                    ]);
                }
            }
            $flasher->addSuccess(__('parents.added_successfully'));
            $this->clearForm();
            $this->currentStep = 1;
        }
        catch (\Exception $err)
        {
            $this->Error = $err->getMessage();
        }
    }


    private function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->ar_father_name = '';
        $this->en_father_name = '';
        $this->en_father_job = '';
        $this->ar_father_job = '';
        $this->father_national_id = '';
        $this->father_passport_id = '';
        $this->father_phone = '';
        $this->father_nationality = '';
        $this->father_blood_type = '';
        $this->father_religion = '';
        $this->father_address = '';
        $this->ar_mother_name = '';
        $this->en_mother_name = '';
        $this->en_mother_job = '';
        $this->ar_mother_job = '';
        $this->mother_national_id = '';
        $this->mother_passport_id = '';
        $this->mother_phone = '';
        $this->mother_nationality = '';
        $this->mother_blood_type = '';
        $this->mother_religion = '';
        $this->mother_address = '';

    }

    public function submitEditForm(FlasherInterface $flasher)
    {
        if( $this->parent_id ){
            $parent = Parents::find($this->parent_id);
            $parent -> update([
                'email' => $this->email,
                'password' => $this->password,

                'father_name' => ['ar' => $this->ar_father_name, 'en' => $this->en_father_name],
                'father_job' => ['ar' => $this->ar_father_job, 'en' => $this->en_father_job],
                'father_national_id' => $this->father_national_id,
                'father_passport_id' => $this->father_passport_id,
                'father_phone' => $this->father_phone,
                'father_nationality_id' => $this->father_nationality,
                'father_blood_type_id' => $this->father_blood_type,
                'father_religion_id' => $this->father_religion,
                'father_address' => $this->father_address,

                'mother_name' => ['ar' => $this->ar_mother_name, 'en' => $this->en_mother_name],
                'mother_job' => ['ar' => $this->ar_mother_job, 'en' => $this->en_mother_job],
                'mother_national_id' => $this->mother_national_id,
                'mother_passport_id' => $this->mother_passport_id,
                'mother_phone' => $this->mother_phone,
                'mother_nationality_id' => $this->mother_nationality,
                'mother_blood_type_id' => $this->mother_blood_type,
                'mother_religion_id' => $this->mother_religion,
                'mother_address' => $this->mother_address,
            ]);
            $flasher->addSuccess( __('parents.edit_successfully') );
            $this->clearForm();
            $this->currentStep = 1;
            $this->show_table = true;
            $this->update_mode = false;
        }
    }

    public function showAddForm()
    {
        $this->show_table = false;
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->update_mode = true;
        $parent = Parents::find($id);
        $this->parent_id = $id;
        $this->email = $parent->email;
        $this->password = $parent->password;
        $this->ar_father_name = $parent->getTranslation('father_name', 'ar');
        $this->en_father_name = $parent->getTranslation('father_name', 'en');
        $this->en_father_job = $parent->getTranslation('father_job', 'en');
        $this->ar_father_job = $parent->getTranslation('father_job', 'ar');
        $this->father_national_id = $parent->father_national_id;
        $this->father_passport_id = $parent->father_passport_id;
        $this->father_phone = $parent->father_phone;
        $this->father_nationality = $parent->father_nationality_id;
        $this->father_blood_type = $parent->father_blood_type_id;
        $this->father_religion = $parent->father_religion_id;
        $this->father_address = $parent->father_address;
        $this->ar_mother_name = $parent->getTranslation('mother_name', 'ar');
        $this->en_mother_name = $parent->getTranslation('mother_name', 'en');
        $this->en_mother_job = $parent->getTranslation('mother_job', 'en');
        $this->ar_mother_job = $parent->getTranslation('mother_job', 'ar');
        $this->mother_national_id = $parent->mother_national_id;
        $this->mother_passport_id = $parent->mother_passport_id;
        $this->mother_phone = $parent->mother_phone;
        $this->mother_nationality = $parent->mother_nationality_id;
        $this->mother_blood_type = $parent->mother_blood_type_id;
        $this->mother_religion = $parent->mother_religion_id;
        $this->mother_address = $parent->mother_address;

    }

    public function delete($id, FlasherInterface $flasher)
    {
        try {
            $parent = Parents::find($id);
            $parent->delete();
            $flasher->addSuccess(__('parents.delete_successfully'));
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }

    }

}
