@extends('layouts.master')

@section('title')
    {{ __('distribution.add_distribution') }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('distribution.add_distribution') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('distribution.add_distribution') }}</li>
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
                    <form action="{{ route('distribution.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label for="teacher_id">{{ __('distribution.teacher') }}</label>
                                <select id="teacher_id" name="teacher_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" >{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="subject_id">{{ __('distribution.subject') }}</label>
                                <select id="subject_id" name="subject_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="grade_id">{{ __('distribution.grade') }}</label>
                                <select id="grade_id" name="grade_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" >{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="classroom_id">{{ __('distribution.classroom') }}</label>
                                <select id="classroom_id" name="classroom_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" >{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="semester_id">{{ __('distribution.semester') }}</label>
                                <select id="semester_id" name="semester_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}" >{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="school_year_id">{{ __('distribution.year') }}</label>
                                <select id="school_year_id" name="school_year_id" class="form-control form-control-lg">
                                    <option selected="" disabled=""></option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}" >{{ $year->name }}</option>
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
