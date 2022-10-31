<!-- Start Edit -->
<div class="modal fade" id="editsubject{{ $subject->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('subjects.edit_subject') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subjects.update', $subject) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $subject->id }}">
                        <div class="col">
                            <label for="ar_name">{{ __('subjects.ar_name') }}</label>
                            <input type="text" name="ar_name" class="form-control" value="{{ $subject->getTranslation('name', 'ar') }}" required>
                        </div>
                        <div class="col">
                            <label for="en_name">{{ __('subjects.en_name') }}</label>
                            <input type="text" name="en_name" class="form-control" value="{{ $subject->getTranslation('name', 'en') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary" >{{ __('subjects.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('subjects.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Edit -->
