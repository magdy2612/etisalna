@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> System {{ $resource->name }}</div>
                        <div class="card-body">
                            <h5>Name: {{ $resource->name }}</h5>
                            <h5>Display Name: {{ $resource->display_name }}</h5>
                            <h5>description: {{ $resource->description }}</h5>
                            <h5>URL: {{ $resource->url }}</h5>
                            <h5>icon: {{ $resource->icon }}</h5>
                            <a href="{{ route('systems.index') }}"
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
