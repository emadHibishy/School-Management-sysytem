<div class="modal fade" id="addschool_year" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('school_years.add_school_year') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('school_years.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label for="name">{{ __('school_years.name') }}</label>
                            <input type="text" name="name" class="form-control" required>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="start_date">{{ __('school_years.start_date') }}</label>
                            <input
                                class="form-control"
                                data-provide="datepicker"
                                type="text"
                                id="start_date"
                                name="start_date"
                                data-date-format="yyyy-mm-dd"
                            />
                        </div>
                        <div class="col">
                            <label for="end_date">{{ __('school_years.end_date') }}</label>
                            <input
                                class="form-control"
                                data-provide="datepicker"
                                type="text"
                                id="end_date"
                                name="end_date"
                                data-date-format="yyyy-mm-dd"
                            />
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary" >{{ __('school_years.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('school_years.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
