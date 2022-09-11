<!-- Start Delete -->
<div class="modal fade" id="deleteclassroom{{ $classroom->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classrooms.destroy',$classroom) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="p-3 w-100">
                            <p class="text-dark text-center font-weight-bold">{{ __('classrooms.delete_confirm') }} <span class="text-danger">{{ $classroom->getTranslation('name',App::getLocale()) }}</span> {{ App::getLocale() == 'ar' ? '؟' : '?' }}</p>
                            <input type="hidden" name="prod_id" id="prod_id" value="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >{{ __('classrooms.classroom_delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('classrooms.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Delete -->
