@extends('layouts.master')
@section('title')
     {{ __('stages.stages') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('stages.stages') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('stages.stages') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('messages')
                <div class="row">
                    <div class="col mb-3">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addStage">{{ __('stages.add_stage') }}</button>
{{--                        <a href="{{ route('stages.create') }}" class="btn btn-success" role="button">{{ __('stages.add_stage') }}</a>--}}
                        @include('pages.stages.create')
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('stages.stage_name') }}</th>
                                <th>{{ __('stages.notes') }}</th>
                                <th>{{ __('stages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($stages as $stage)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stage->name }}</td>
                                <td>{{ $stage->notes }}</td>
{{--                                <td>{{ __('stages.operations') }}</td>--}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="{{ __('stages.stage_edit') }}" data-target="#editStage{{ $stage->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('stages.stage_delete') }}" data-target="#deleteStage{{ $stage->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('stages.edit', $stage) }}" class="btn btn-success btn-sm" title="{{ __('stages.stage_edit') }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>

                            @include('pages.stages.edit')

                            @include('pages.stages.delete')
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('stages.no_stages') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    @include('stages.delete')--}}
@endsection



@section('js')
{{--    <script>--}}
{{--        $('#deleteStage').on('show.bs.modal', function(event){--}}
{{--            let button = $(event.relatedTarget)--}}
{{--            let stage_id = button.data('stage_id')--}}
{{--            let modal = $(this)--}}
{{--            modal.find('.modal-body #stage_id').val(stage_id)--}}
{{--        })--}}
{{--    </script>--}}

@endsection
