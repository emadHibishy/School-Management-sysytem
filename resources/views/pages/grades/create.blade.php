<div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 70vw">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('grades.add_grade') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="grades">
                                <div data-repeater-item>
                                    <div class="row mb-30">
                                        <div class="col">
                                            <label for="grade_name_ar">{{ __('grades.ar_grade_name') }} :</label>
                                            <input type="text" name="grade_name_ar" class="form-control  " >
                                        </div>

                                        <div class="col">
                                            <label for="grade_name_en">{{ __('grades.en_grade_name') }} :</label>
                                            <input type="text" name="grade_name_en" class="form-control  " >
                                        </div>

                                        <div class="col">
                                            <div class="box">
                                                <label for="stage_id">{{ __('grades.stage') }} :</label>
                                                <select name="stage_id" class="fancyselect  ">
                                                    <option selected disabled></option>
                                                    @forelse($stages as $stage)
                                                        <option value="{{ $stage->id }}">{{ $stage->getTranslation('name', App::getLocale()) }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>{{ __('grades.operations') }} :</label>
                                            <input class="btn btn-danger btn-block btn-lg" data-repeater-delete type="button" value="{{ __('grades.grade_delete') }}"/>
                                        </div>

                                    </div>
                                </div>
                                            {{--                                <div data-repeater-item>--}}
{{--                                    <form class=" row mb-30">--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <input class="form-control" type="text" placeholder="Name" />--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <input class="form-control" type="text" placeholder="Email" />--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <textarea class="form-control" placeholder="Your Message">Your Message</textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <input class="form-control" type="text" value="+(704) 279-1249" />--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <div class="box">--}}
{{--                                                <select name="select-input" class="fancyselect">--}}
{{--                                                    <option value="1">Sex</option>--}}
{{--                                                    <option value="2">Male</option>--}}
{{--                                                    <option value="3">Female</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="Delete"/>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ __('grades.add_grade') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('grades.cancel') }}</button>
                        <button type="submit" class="btn btn-primary" >{{ __('grades.save') }}</button>
                    </div>

                </form>
{{--                <form action="{{ route('grades.store') }}" method="POST" autocomplete="off">--}}
{{--                    @csrf--}}

{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <label>{{ __('grades.ar_grade_name') }}</label>--}}
{{--                            <input type="text" name="grade_name_ar" class="form-control  is_invalid> " required>--}}

{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <label>{{ __('grades.en_grade_name') }}</label>--}}
{{--                            <input type="text" name="grade_name_en" class="form-control  is_invalid> " required>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-3">--}}
{{--                        <div class="col">--}}
{{--                            <label>{{ __('grades.ar_notes') }}</label>--}}
{{--                            <textarea class="form-control" name="notes_ar" rows="3"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <label>{{ __('grades.en_notes') }}</label>--}}
{{--                            <textarea class="form-control" name="notes_en" rows="3"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary" >{{ __('grades.submit') }}</button>--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('grades.cancel') }}</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

            </div>

        </div>
    </div>
</div>
