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
                            <form method="POST" action="{{ route('systems.update', $resource->id) }}" enctype="multipart/form-data">
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
                                      {{ __('Display Name') }}
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Display Name') }}"
                                           name="display_name" value="{{ $resource->display_name }}" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      {{ __('Url') }}
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Url') }}" name="url"
                                           value="{{ $resource->url }}" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      {{ __('Icon') }}
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Icon') }}" name="icon"
                                           value="{{ $resource->icon }}" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      {{ ('Desription') }}
                                      </span>
                                    </div>
                                    <textarea class="form-control" id="textarea-input" name="description" rows="9"
                                              placeholder="{{ __('Description..') }}"
                                              required>{{ $resource->description }}</textarea>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('systems.index') }}"
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
