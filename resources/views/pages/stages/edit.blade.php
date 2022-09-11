<!-- Start Edit -->
<div class="modal fade" id="editStage{{ $stage->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('stages.stage_edit') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stages.update', $stage) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col">
                            <label>{{ __('stages.ar_stage_name') }}</label>
                            <input type="text" name="stage_name_ar" class="form-control" value="{{ $stage->getTranslation('name','ar') }}" required>

                        </div>
                        <div class="col">
                            <label>{{ __('stages.en_stage_name') }}</label>
                            <input type="text" name="stage_name_en" class="form-control " value="{{ $stage->getTranslation('name','en') }}" required>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('stages.ar_notes') }}</label>
                            <textarea class="form-control" name="notes_ar" rows="3">{{ $stage->getTranslation('notes','ar') }}</textarea>
                        </div>
                        <div class="col">
                            <label>{{ __('stages.en_notes') }}</label>
                            <textarea class="form-control" name="notes_en" rows="3">{{ $stage->getTranslation('notes','en') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <input type="hidden" name="id" class="form-control" value="{{ $stage->id }}" >
                        <button type="submit" class="btn btn-primary" >{{ __('stages.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('stages.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Edit -->
