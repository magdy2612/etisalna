@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Company {{ $resource->name }}</div>
                        <div class="card-body">
                            <h5>Name: {{ $resource->name }}</h5>
                            <h5>CRM ID: {{ $resource->crm_id }}</h5>
                            <a href="{{ route('companies.index') }}"
                               class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
