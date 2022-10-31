@extends('layouts.master')
@section('title')
     {{ __('distribution.distribution') }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('distribution.distribution') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('distribution.distribution') }}</li>
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
                        <a href="{{ route('distribution.create') }}" class="btn btn-success mb-3">{{ __('distribution.add_distribution') }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('distribution.teacher') }}</th>
                                <th>{{ __('distribution.subject') }}</th>
                                <th>{{ __('distribution.grade') }}</th>
                                <th>{{ __('distribution.classroom') }}</th>
                                <th>{{ __('distribution.semester') }}</th>
                                <th>{{ __('distribution.year') }}</th>
                                <th>{{ __('teachers.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($distributions as $distribution)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $distribution->Teacher->name }}</td>
                                <td>{{ $distribution->Subject->name }}</td>
                                <td>{{ $distribution->Grade->name }}</td>
                                <td>{{ $distribution->Classroom->name }}</td>
                                <td>{{ $distribution->Semester->name }}</td>
                                <td>{{ $distribution->SchoolYear->name }}</td>
                                <td>
                                    <a href="{{ route('distribution.edit', $distribution->id) }}" class="btn btn-info btn-sm" title="{{ __('distribution.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('distribution.delete') }}" data-target="#deletedistribution{{ $distribution->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('pages.distribution.delete')
                        @empty
                            <tr>
                                <td colspan="8"><p class="text-danger text-center">{{ __('distribution.no_distribution') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
