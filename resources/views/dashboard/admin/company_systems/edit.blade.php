@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $resource['system']->name }} System</div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('company.systems.update', [$company_id, $resource->id]) }}" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group row">
                                    <label>URL</label>
                                    <input type="text" class="form-control" name="url" value="{{ $resource->url }}"/>
                                </div>
                                <div class="form-group row">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="{{ $resource->start_date }}" required/>
                                </div>
                                <div class="form-group row">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{ $resource->end_date }}" required/>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('company.systems.index', $company_id) }}"
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
