@extends('dashboard.base')
@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create System') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('systems.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Display Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Display Name') }}" name="display_name" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Url</label>
                                <input class="form-control" type="text" placeholder="https://example.com" name="url" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Description</label>
                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required></textarea>
                            </div>

                            <div class="form-group row">
                                <label>Icon</label>
                                <input class="form-control" type="text" placeholder="{{ __('Icon') }}" name="icon" required autofocus>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('systems.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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