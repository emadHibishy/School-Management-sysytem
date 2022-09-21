 <div>

    @if(!empty($Error))
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p class="text-danger">{{ $Error }}</p>
        </div>
    @endif

    @if($show_table)
        @include('livewire.show_table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep == 1 ? 'btn-success' : 'btn-default' }}">1</a>
                    <p>{{ __('parents.father_info') }}</p>
                </div>

                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep == 2 ? 'btn-success' : 'btn-default' }}">2</a>
                    <p>{{ __('parents.mother_info') }}</p>
                </div>

                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep == 3 ? 'btn-success' : 'btn-default' }}" disabled="disabled">3</a>
                    <p>{{ __('parents.confirmation') }}</p>
                </div>
            </div>
        </div>


        @include('livewire.father_information')
        @include('livewire.mother_information')

        @if($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12 text-center">
                        @if(!$update_mode)
                            <div class="form-group">
                                <label class="{{ app()->getLocale() == 'ar' ? 'pull-right' : 'pull-left' }} text-primary" for="photos">{{ __('parents.attachements') }}</label>
                                <input type="file" class="form-control-file" wire:model="photos" accept="image/*" multiple>
                            </div>
                            <br>
                        @endif

                        <h3 class="mt-30">{{ __('parents.save_confirm') }}</h3><br>
                        <button class="btn btn-danger btn-sm nextBtn btn-lg {{ app()->getLocale() == 'ar' ? 'pull-right' : 'pull-left' }} mt-30" type="button" wire:click="prev">
                            {{__('parents.prev')}}
                        </button>
                        @if($update_mode)
                            <button class="btn btn-success btn-sm nextBtn btn-lg {{ app()->getLocale() == 'ar' ? 'pull-left' : 'pull-right' }} mt-30" wire:click="submitEditForm"
                                    type="button">{{__('parents.finish')}}
                            </button>
                        @else
                        <button class="btn btn-success btn-sm nextBtn btn-lg {{ app()->getLocale() == 'ar' ? 'pull-left' : 'pull-right' }} mt-30" wire:click="submitForm"
                                type="button">{{__('parents.finish')}}
                        </button>
                        @endif
                    </div>

                </div>
            </div>
    @endif
 </div>

{{--</div>--}}
