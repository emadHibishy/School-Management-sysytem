@extends('layouts.master')
@section('title')
     {{ __('subjects.subjects') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('subjects.subjects') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('subjects.subjects') }}</li>
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
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addsubject">{{ __('subjects.add_subject') }}</button>
{{--                        <a href="{{ route('subjects.create') }}" class="btn btn-success" role="button">{{ __('subjects.add_subject') }}</a>--}}
                        @include('pages.subjects.create')
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('subjects.name') }}</th>
                                <th>{{ __('subjects.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subject->name }}</td>
{{--                                <td>{{ __('subjects.operations') }}</td>--}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="{{ __('subjects.subject_edit') }}" data-target="#editsubject{{ $subject->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('subjects.subject_delete') }}" data-target="#deletesubject{{ $subject->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-success btn-sm" title="{{ __('subjects.subject_edit') }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>

                            @include('pages.subjects.edit')

                            @include('pages.subjects.delete')
                        @empty
                            <tr>
                                <td colspan="3"><p class="text-danger text-center">{{ __('subjects.no_subjects') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    @include('subjects.delete')--}}
@endsection



@section('js')
@endsection
