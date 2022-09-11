<div class="modal fade" id="editclassroom{{ $classroom->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('classrooms.classroom_delete') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classrooms.update', $classroom) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col">
                                <label for="classroom_name_ar">{{ __('classrooms.ar_classroom_name') }} :</label>
                                <input type="text" name="classroom_name_ar" class="form-control" value="{{ $classroom->getTranslation('name', 'ar') }}">
                            </div>

                            <div class="col">
                                <label for="classroom_name_en">{{ __('classrooms.en_classroom_name') }} :</label>
                                <input type="text" name="classroom_name_en" class="form-control  "  value="{{ $classroom->getTranslation('name', 'en') }}">
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col">
                                <div class="box">
                                    <label for="stage_id">{{ __('classrooms.stage_name') }} :</label>
                                    <select id="stage_id" name="stage_id" class="form-control form-control-lg">
                                        <option selected disabled></option>
                                        @forelse($stages as $stage)
                                            <option value="{{ $stage->id }}" {{ $stage->id == $classroom->stage_id ? 'selected' : '' }}>{{ $stage->getTranslation('name', App::getLocale()) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col">
                                <div class="box">
                                    <label for="grade_id">{{ __('classrooms.grade_name') }} :</label>
                                    <select name="grade_id" id="grade_id" class="form-control form-control-lg">
                                        <option value="{{ $classroom->grade_id }}" selected>{{ $classroom->Grade->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col">
                                <div class="form-group form-check">
                                    <input type="checkbox" id="status" class="form-check-input" name="status" {{ $classroom->status ==1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">{{ __('classrooms.status') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('classrooms.cancel') }}</button>
                        <button type="submit" class="btn btn-primary" >{{ __('classrooms.save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
