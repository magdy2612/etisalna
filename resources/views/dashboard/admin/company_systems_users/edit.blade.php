@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $resource['user']->name }} Credentials</div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('company.system.users.update', [$company_system_id, $resource->id]) }}" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group row">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $resource->username }}" required/>
                                </div>
                                <div class="form-group row">
                                    <label>Passwors</label>
                                    <input type="text" class="form-control" name="password" value="{{ $resource->password }}" required/>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('company.system.users.index', $company_system_id) }}"
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
