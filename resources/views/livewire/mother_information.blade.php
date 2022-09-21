@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="ar_mother_name">{{__('parents.ar_mother_name')}}</label>
                        <input type="text" wire:model="ar_mother_name" class="form-control" >
                        @error('ar_mother_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="en_mother_name">{{__('parents.en_mother_name')}}</label>
                        <input type="text" wire:model="en_mother_name" class="form-control" >
                        @error('en_mother_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-row mt-30">
                    <div class="col-md-3">
                        <label for="ar_mother_job">{{__('parents.ar_mother_job')}}</label>
                        <input type="text" wire:model="ar_mother_job" class="form-control">
                        @error('ar_mother_job')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="en_mother_job">{{__('parents.en_mother_job')}}</label>
                        <input type="text" wire:model="en_mother_job" class="form-control">
                        @error('en_mother_job')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="mother_national_id">{{__('parents.mother_national_id')}}</label>
                        <input type="text" wire:model="mother_national_id" class="form-control">
                        @error('mother_national_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_passport_id">{{__('parents.mother_passport_id')}}</label>
                        <input type="text" wire:model="mother_passport_id" class="form-control">
                        @error('mother_passport_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="mother_phone">{{__('parents.mother_phone')}}</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div class="form-row mt-30">
                    <div class="form-group col-md-6">
                        <label for="mother_nationality">{{__('parents.mother_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality">
                            <option selected></option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_nationality')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mother_blood_type">{{__('parents.mother_blood_type')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_blood_type">
                            <option selected></option>
                            @foreach($blood_types as $blood_type)
                                <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_blood_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col ">
                        <label for="mother_religion">{{__('parents.mother_religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_religion">
                            <option selected></option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_religion')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-group mt-30">
                    <label for="mother_address">{{__('parents.mother_address')}}</label>
                    <textarea class="form-control" wire:model="mother_address" id="mother_address" rows="4"></textarea>
                    @error('mother_address')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg {{ app()->getLocale() == 'ar' ? 'pull-right' : 'pull-left' }} mt-30" type="button" wire:click="prev">
                    {{__('parents.prev')}}
                </button>
                <button class="btn btn-success btn-sm nextBtn btn-lg {{ app()->getLocale() == 'ar' ? 'pull-left' : 'pull-right' }} mt-30" wire:click="next"
                        type="button">{{__('parents.next')}}
                </button>

            </div>
        </div>
    </div>
