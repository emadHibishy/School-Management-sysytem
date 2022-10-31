@extends('layouts.master')
@section('title')
     {{ __('classrooms.classrooms') }}
@endsection



@section('css')
@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('classrooms.classrooms') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('classrooms.classrooms') }}</li>
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
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addclassroom">{{ __('classrooms.add_classroom') }}</button>
{{--                        <a href="{{ route('classrooms.create') }}" class="btn btn-success" role="button">{{ __('classrooms.add_classroom') }}</a>--}}
                        @include('pages.classrooms.create')
                    </div>
                </div>
                <div class="accordion accordion-border">
                @forelse($stages as $stage)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $stage->name }}</a>
                            <div class="acd-des">

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('classrooms.classroom_name') }}</th>
                                            <th>{{ __('classrooms.grade_name') }}</th>
                                            <th>{{ __('classrooms.status') }}</th>
                                            <th>{{ __('classrooms.operations') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($stage->Classrooms as $classroom)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $classroom->name }}</td>
                                                <td>{{ $classroom->Grade->getTranslation('name', app()->getLocale()) }}</td>
                                                <td>
                                                    @if($classroom->status == 1)
                                                        <label class="badge badge-success">
                                                            {{ __('classrooms.active') }}
                                                        </label>
                                                    @else
                                                        <label class="badge badge-danger">
                                                            {{ __('classrooms.disabled') }}
                                                        </label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="{{ __('classrooms.classroom_edit') }}" data-target="#editclassroom{{ $classroom->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('classrooms.classroom_delete') }}" data-target="#deleteclassroom{{ $classroom->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            @include('pages.classrooms.edit')

                                            @include('pages.classrooms.delete')
                                        @empty
                                            <tr>
                                                <td colspan="5"><p class="text-danger text-center">{{ __('classrooms.no_classrooms') }}</p></td>
                                            </tr>
                                        @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                @empty
                @endforelse
            </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script>
    $(document).ready(
        function (){
            $('select[name="stage_id"]').on('change', function () {
                const stage = $(this)
                let gradeId = $(this).val();
                if(gradeId) {
                    $.ajax({
                        url: "{{ URL::to('classrooms/gradesbystage') }}/" + gradeId,
                        type: "GET",
                        dataType: "json",
                        success: function (data){
                            // console.log(stage.parents('.col.stage'))
                            $('select[name="grade_id"]').empty().append(`<option disabled selected>{{ __('classrooms.select_grade') }}</option>`);
                            $.each(data, function(key, value){
                                $('select[name="grade_id"]').append(`<option value="${key}">${value}</option>`);
                            });
                        }
                    });
                }
            });
        }
    );
</script>

@endsection
