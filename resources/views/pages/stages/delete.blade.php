<!-- Start Delete -->
<div class="modal fade" id="deleteStage{{ $stage->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stages.destroy',$stage) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="p-3 w-100">
                            <p class="text-dark text-center font-weight-bold">{{ __('stages.delete_confirm') }} <span class="text-danger">{{ $stage->getTranslation('name',App::getLocale()) }}</span> {{ App::getLocale() == 'ar' ? '؟' : '?' }}</p>
                            <input type="hidden" name="prod_id" id="prod_id" value="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >{{ __('stages.stage_delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('stages.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Delete -->
