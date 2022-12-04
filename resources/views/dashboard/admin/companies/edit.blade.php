@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $resource->name }}</div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('companies.update', $resource->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      {{ __('Name') }}
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name"
                                           value="{{ $resource->name }}" required autofocus>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      {{ __('CRM ID') }}
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('CRM ID') }}"
                                           name="crm_id" value="{{ $resource->crm_id }}" required>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('companies.index') }}"
                                   class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
