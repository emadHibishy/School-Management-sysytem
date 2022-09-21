@extends('layouts.master')

@section('title')
    {{ __('teachers.edit_teacher') }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('teachers.edit_teacher') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('teachers.edit_teacher') }}</li>
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
                    <form action="{{ route('teachers.update', $teacher) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="ar_teacher_name">{{ __('teachers.ar_teacher_name') }}</label>
                                <input
                                    type="text"
                                    name="ar_teacher_name"
                                    class="form-control"
                                    value="{{ $teacher->getTranslation('name', 'ar') }}"
                                />

                            </div>
                            <div class="col">
                                <label for="en_teacher_name">{{ __('teachers.en_teacher_name') }}</label>
                                <input
                                    type="text"
                                    name="en_teacher_name"
                                    class="form-control"
                                    value="{{ $teacher->getTranslation('name', 'en') }}"
                                />

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="email">{{ __('teachers.email') }}</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ $teacher->email }}"
                                />

                            </div>
                            <div class="col">
                                <label for="password">{{ __('teachers.new_password') }}</label>
                                <input
                                    type="hidden"
                                    name="password"
                                    class="form-control "
                                    value="{{ $teacher->password }}"
                                />
                                <input
                                    type="password"
                                    name="new_password"
                                    class="form-control"
                                />

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="specialization">{{ __('teachers.specialization') }}</label>
                                <select class="custom-select my-1 mr-sm-2" id="specialization" name="specialization">
                                    <option selected=""></option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" {{$specialization->id == $teacher->specialization_id ? 'selected="selected"' : '' }}>{{ $specialization->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <label for="gender">{{ __('teachers.gender') }}</label>
                                <select class="custom-select my-1 mr-sm-2" id="gender" name="gender">
                                    <option selected=""></option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}"{{$gender->id == $teacher->gender_id ? 'selected="selected"' : '' }}>{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="birth_date">{{ __('teachers.birth_date') }}</label>
                                <input
                                    class="form-control"
                                    data-provide="datepicker"
                                    type="text"  id="birth_date"
                                    name="birth_date"
                                    data-date-format="yyyy-mm-dd"
                                    value="{{ $teacher->birth_date }}"
                                />

                            </div>
                            <div class="col">
                                <label for="start_date">{{ __('teachers.start_date') }}</label>
                                <input
                                    class="form-control"
                                    data-provide="datepicker"
                                    type="text"
                                    id="start_date"
                                    name="start_date"
                                    data-date-format="yyyy-mm-dd"
                                    value="{{ $teacher->start_date }}"
                                />

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="address">{{ __('teachers.address') }}</label>
                                <textarea class="form-control" name="address" rows="4">{{ $teacher->address }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >{{ __('teachers.save') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('teachers.cancel') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        $('.datepicker').datepicker();
    </script>
@endsection
