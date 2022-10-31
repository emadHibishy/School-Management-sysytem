<!-- Start Delete -->
<div class="modal fade" id="deletesubject{{ $subject->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subjects.destroy',$subject) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="p-3 w-100">
                            <p class="text-dark text-center font-weight-bold">{{ __('subjects.delete_confirm') }} <span class="text-danger">{{ $subject->name }}</span> {{ App::getLocale() == 'ar' ? '؟' : '?' }}</p>
                            <input type="hidden" name="prod_id" id="prod_id" value="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >{{ __('subjects.delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('subjects.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Delete -->
