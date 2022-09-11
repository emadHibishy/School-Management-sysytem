@extends('layouts.master')
@section('title')
     {{ __('grades.grades') }}
@endsection



@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('grades.grades') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('grades.grades') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('messages')
                @include('pages.grades.delete_all')
                <div class="row">
                    <div class="col mb-3">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addgrade">{{ __('grades.add_grade') }}</button>
                        <button type="button" class="btn btn-danger mb-3" id="btn_delete_all" >{{ __('grades.delete_all') }}</button>
{{--                        <a href="{{ route('grades.create') }}" class="btn btn-success" role="button">{{ __('grades.add_grade') }}</a>--}}
                        @include('pages.grades.create')
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <form action="{{ route('grades.stage') }}" method="post">
                            @csrf
                            <select name="stage_id" class="selectpicker" onchange="this.form.submit()">
                                <option selected disabled>{{ __('stages.stages') }}</option>
                                @forelse($stages as $stage)
                                    <option value="{{ $stage->id }}">{{ $stage->getTranslation('name', App::getLocale()) }}</option>
                                @empty
                                @endforelse
                            </select>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="delete_all" onclick="CheckAll('grade_box', this)"></th>
                                <th>#</th>
                                <th>{{ __('grades.grade_name') }}</th>
                                <th>{{ __('grades.stage') }}</th>
                                <th>{{ __('grades.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($grades as $grade)
                            <tr>
                                <td><input type="checkbox" value="{{ $grade->id }}" class="grade_box"></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $grade->getTranslation('name', App::getLocale() ) }}</td>
                                <td>{{ $grade->Stage->getTranslation('name', App::getLocale() ) }} </td>
{{--                                <td>{{ __('grades.operations') }}</td>--}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="{{ __('grades.grade_edit') }}" data-target="#editgrade{{ $grade->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ __('grades.grade_delete') }}" data-target="#deletegrade{{ $grade->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('grades.edit', $grade) }}" class="btn btn-success btn-sm" title="{{ __('grades.grade_edit') }}">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>

                            @include('pages.grades.edit')

                            @include('pages.grades.delete')
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('grades.no_grades') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    @include('grades.delete')--}}
@endsection



@section('scripts')
{{--    <script>--}}
{{--        $('#deletegrade').on('show.bs.modal', function(event){--}}
{{--            let button = $(event.relatedTarget)--}}
{{--            let grade_id = button.data('grade_id')--}}
{{--            let modal = $(this)--}}
{{--            modal.find('.modal-body #grade_id').val(grade_id)--}}
{{--        })--}}
{{--    </script>--}}
<script>
    $('#btn_delete_all').click(function(){
        var selected = [];
        $("#datatable td input[type=checkbox]:checked").each(function (){
            selected.push(this.value);
        });

        if (selected.length > 0 ){
            console.log('test')
            $('#delete_all').modal('show')
            $('input[id="delete_all_id"]').val(selected)
        }
    });
</script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


@endsection
