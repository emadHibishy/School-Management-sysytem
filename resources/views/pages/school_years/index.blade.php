@extends('layouts.master')
@section('title')
     {{ __('school_years.school_years') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('school_years.school_years') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('school_years.school_years') }}</li>
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
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addschool_year">{{ __('school_years.add_school_year') }}</button>
{{--                        <a href="{{ route('school_years.create') }}" class="btn btn-success" role="button">{{ __('school_years.add_school_year') }}</a>--}}
                        @include('pages.school_years.create')
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('school_years.name') }}</th>
                                <th>{{ __('school_years.start_date') }}</th>
                                <th>{{ __('school_years.end_date') }}</th>
                                <th>{{ __('school_years.status') }}</th>
                                <th>{{ __('school_years.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($school_years as $school_year)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $school_year->name }}</td>
                                <td>{{ $school_year->start_date }}</td>
                                <td>{{ $school_year->end_date }}</td>
                                <td>
                                    @if($school_year->status == 1)
                                        <label class="badge badge-success">
                                            {{ __('school_years.active') }}
                                        </label>
                                    @else
                                        <label class="badge badge-danger">
                                            {{ __('school_years.inactive') }}
                                        </label>
                                    @endif
                                </td>
{{--                                <td>{{ __('school_years.operations') }}</td>--}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="{{ __('school_years.school_year_edit') }}" data-target="#editschool_year{{ $school_year->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('school_years.school_year_delete') }}" data-target="#deleteschool_year{{ $school_year->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('school_years.edit', $school_year) }}" class="btn btn-success btn-sm" title="{{ __('school_years.school_year_edit') }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>

                            @include('pages.school_years.edit')

                            @include('pages.school_years.delete')
                        @empty
                            <tr>
                                <td colspan="6"><p class="text-danger text-center">{{ __('school_years.no_school_years') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    @include('school_years.delete')--}}
@endsection



@section('js')
{{--    <script>--}}
{{--        $('#deleteschool_year').on('show.bs.modal', function(event){--}}
{{--            let button = $(event.relatedTarget)--}}
{{--            let school_year_id = button.data('school_year_id')--}}
{{--            let modal = $(this)--}}
{{--            modal.find('.modal-body #school_year_id').val(school_year_id)--}}
{{--        })--}}
{{--    </script>--}}
<script>
    $('.datepicker').datepicker();
</script>

@endsection
