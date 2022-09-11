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
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="en_mother_name">{{__('parents.en_mother_name')}}</label>
                        <input type="text" wire:model="en_mother_name" class="form-control" >
                        @error('en_mother_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="ar_mother_job">{{__('parents.ar_mother_job')}}</label>
                        <input type="text" wire:model="ar_mother_job" class="form-control">
                        @error('ar_mother_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="en_mother_job">{{__('parents.en_mother_job')}}</label>
                        <input type="text" wire:model="en_mother_job" class="form-control">
                        @error('en_mother_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="mother_national_id">{{__('parents.mother_national_id')}}</label>
                        <input type="text" wire:model="mother_national_id" class="form-control">
                        @error('mother_national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_passport_id">{{__('parents.mother_passport_id')}}</label>
                        <input type="text" wire:model="mother_passport_id" class="form-control">
                        @error('mother_passport_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="mother_phone">{{__('parents.mother_phone')}}</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mother_nationality">{{__('parents.mother_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality">
                            <option selected disabled></option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mother_blood_type">{{__('parents.mother_blood_type')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_blood_type">
                            <option selected disabled></option>
                            @foreach($blood_types as $blood_type)
                                <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_blood_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mother_religion">{{__('parents.moter_religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_religion">
                            <option selected disabled></option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_religion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="mother_address">{{__('parents.moter_address')}}</label>
                    <textarea class="form-control" wire:model="mother_address" id="mother_address" rows="4"></textarea>
                    @error('mother_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="prev">
                    {{__('parents.prev')}}
                </button>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="next"
                        type="button">{{__('parents.next')}}
                </button>

            </div>
        </div>
    </div>
