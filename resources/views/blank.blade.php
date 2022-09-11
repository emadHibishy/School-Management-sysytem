@extends('layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('dashboard.empty') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('dashboard.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('dashboard.empty') }}</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
@endsection
