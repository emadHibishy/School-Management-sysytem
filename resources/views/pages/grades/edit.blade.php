<!-- Start Edit -->
<div class="modal fade" id="editgrade{{ $grade->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 43vw">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('grades.grade_edit') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body mb-30">
                <form action="{{ route('grades.update', $grade) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col">
                            <label>{{ __('grades.ar_grade_name') }}</label>
                            <input type="text" name="grade_name_ar" class="form-control" value="{{ $grade->getTranslation('name','ar') }}" required>

                        </div>
                        <div class="col">
                            <label>{{ __('grades.en_grade_name') }}</label>
                            <input type="text" name="grade_name_en" class="form-control " value="{{ $grade->getTranslation('name','en') }}" required>

                        </div>
                        <div class="col">
                            <div class="box">
                                <label for="stage_id">{{ __('grades.stage') }} :</label>
                                <select name="stage_id" class="fancyselect  ">
                                    @forelse($stages as $stage)
                                        <option value="{{ $stage->id }}" {{ $stage->id == $grade->stage_id ? 'selected' : '' }}>{{ $stage->getTranslation('name', App::getLocale()) }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-30">
                        <input type="hidden" name="id" class="form-control" value="{{ $grade->id }}" >
                        <button type="submit" class="btn btn-primary" >{{ __('grades.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('grades.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Edit -->
