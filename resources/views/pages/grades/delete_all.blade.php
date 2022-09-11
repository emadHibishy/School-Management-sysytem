<!-- Start Delete -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.delete_all') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="p-3 w-100">
                            <p class="text-dark text-center font-weight-bold">{{ __('grades.delete_all_confirm') }}</p>
                            <input type="hidden" id="delete_all_id" name="ids" >
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >{{ __('grades.grade_delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('grades.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Delete -->
