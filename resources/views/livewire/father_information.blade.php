@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{ __('parents.email') }}</label>
                        <input type="email" wire:model="Email"  class="form-control">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('parents.password')}}</label>
                        <input type="password" wire:model="Password" class="form-control" >
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="ar_father_name">{{__('parents.ar_father_name')}}</label>
                        <input type="text" wire:model="ar_father_name" class="form-control" >
                        @error('ar_father_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="en_father_name">{{__('parents.en_father_name')}}</label>
                        <input type="text" wire:model="en_father_name" class="form-control" >
                        @error('en_father_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="ar_father_job">{{__('parents.ar_father_job')}}</label>
                        <input type="text" wire:model="ar_father_job" class="form-control">
                        @error('ar_father_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="en_father_job">{{__('parents.en_father_job')}}</label>
                        <input type="text" wire:model="en_father_job" class="form-control">
                        @error('en_father_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="father_national_id">{{__('parents.father_national_id')}}</label>
                        <input type="text" wire:model="father_national_id" class="form-control">
                        @error('father_national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="father_passport_id">{{__('parents.father_passport_id')}}</label>
                        <input type="text" wire:model="father_passport_id" class="form-control">
                        @error('father_passport_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="father_phone">{{__('parents.father_phone')}}</label>
                        <input type="text" wire:model="father_phone" class="form-control">
                        @error('father_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="father_nationality">{{__('parents.father_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_nationality">
                            <option selected></option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        @error('father_nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="father_blood_type">{{__('parents.father_blood_type')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_blood_type">
                            <option selected></option>
                            @foreach($blood_types as $blood_type)
                                <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                            @endforeach
                        </select>
                        @error('father_blood_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="father_religion">{{__('parents.father_religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_religion">
                            <option selected></option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('father_religion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="father_address">{{__('parents.father_address')}}</label>
                    <textarea class="form-control" wire:model="father_address" id="father_address" rows="4"></textarea>
                    @error('father_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="next"
                        type="button">{{__('parents.next')}}
                </button>

            </div>
        </div>
    </div>
