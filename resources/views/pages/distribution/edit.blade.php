@extends('layouts.master')

@section('title')
    {{ __('distribution.edit_distribution') }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('distribution.edit_distribution') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('distribution.edit_distribution') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-30" role="document">
            <div class="card card-statistics h-100">
                <div class="card-header">

                    @include('messages')
                </div>
                <div class="card-body">
                    <form action="{{ route('distribution.update', $teachersDistribution) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teachersDistribution->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="teacher_id">{{ __('distribution.teacher') }}</label>
                                <select id="teacher_id" name="teacher_id" class="form-control form-control-lg">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $teacher->id == $teachersDistribution->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="subject_id">{{ __('distribution.subject') }}</label>
                                <select id="subject_id" name="subject_id" class="form-control form-control-lg">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $subject->id == $teachersDistribution->subject_id ? 'selected' : '' }} >{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="grade_id">{{ __('distribution.grade') }}</label>
                                <select id="grade_id" name="grade_id" class="form-control form-control-lg">\
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ $grade->id == $teachersDistribution->grade_id ? 'selected' : '' }} >{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="classroom_id">{{ __('distribution.classroom') }}</label>
                                <select id="classroom_id" name="classroom_id" class="form-control form-control-lg">
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" {{ $classroom->id == $teachersDistribution->classroom_id ? 'selected' : '' }} >{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="semester_id">{{ __('distribution.semester') }}</label>
                                <select id="semester_id" name="semester_id" class="form-control form-control-lg">
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}" {{ $semester->id == $teachersDistribution->semester_id ? 'selected' : '' }} >{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="school_year_id">{{ __('distribution.year') }}</label>
                                <select id="school_year_id" name="school_year_id" class="form-control form-control-lg">
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}" {{ $year->id == $teachersDistribution->school_year_id ? 'selected' : '' }} >{{ $year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >{{ __('distribution.save') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('distribution.cancel') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('scripts')
@endsection
