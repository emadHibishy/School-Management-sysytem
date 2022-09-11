<div>

    <div>
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


    </div>

    @include('livewire.father_information')
    @include('livewire.mother_information')

    @if($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="col-xs-12">
                <div class="col-md-12 text-center">
                    <h3 class="mt-30">{{ __('parents.save_confirm') }}</h3><br>
                    <div class="btn-group">
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="prev">
                            {{__('parents.prev')}}
                        </button>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="next"
                                type="button">{{__('parents.next')}}
                        </button>
                    </div>

                </div>
            </div>
        </div>


</div>
