@extends('layouts.master')
@section('title')
     {{ __('teachers.teachers') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('teachers.teachers') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('teachers.teachers') }}</li>
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
                        <a href="{{ route('teachers.create') }}" class="btn btn-success mb-3">{{ __('teachers.add_teacher') }}</a>
{{--                        <a href="{{ route('teachers.create') }}" class="btn btn-success" role="button">{{ __('teachers.add_teacher') }}</a>--}}
{{--                        @include('pages.teachers.create')--}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('teachers.teacher_name') }}</th>
                                <th>{{ __('teachers.email') }}</th>
                                <th>{{ __('teachers.specialization') }}</th>
                                <th>{{ __('teachers.gender') }}</th>
                                <th>{{ __('teachers.start_year') }}</th>
                                <th>{{ __('teachers.age') }}</th>
                                <th>{{ __('teachers.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->specialization->name }}</td>
                                <td>{{ $teacher->gender->name }}</td>
                                <td>{{ date('Y', strtotime($teacher->start_date)) }}</td>
                                <td>{{ \Carbon\Carbon::parse($teacher->birth_date)->age }}</td>
{{--                                <td>{{ __('teachers.operations') }}</td>--}}
                                <td>
                                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-info btn-sm" title="{{ __('teachers.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('teachers.delete') }}" data-target="#deleteteacher{{ $teacher->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-success btn-sm" title="{{ __('teachers.teacher_edit') }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>

{{--                            @include('pages.teachers.edit')--}}

                            @include('pages.teachers.delete')
                        @empty
                            <tr>
                                <td colspan="8"><p class="text-danger text-center">{{ __('teachers.no_teachers') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    @include('pages.teachers.delete')--}}
@endsection



@section('scripts')
{{--    <script>--}}
{{--        $('#deleteteacher').on('show.bs.modal', function(event){--}}
{{--            let button = $(event.relatedTarget)--}}
{{--            let teacher_id = button.data('teacher_id')--}}
{{--            let modal = $(this)--}}
{{--            modal.find('.modal-body #teacher_id').val(teacher_id)--}}
{{--        })--}}
{{--    </script>--}}

@endsection
