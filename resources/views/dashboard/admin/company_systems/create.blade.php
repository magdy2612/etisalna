@extends('dashboard.base')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        {{ __('Assign System To Company') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.systems.store', $company_id) }}">
                            @csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <select class="form-control" name="system_id" required>
                                    @foreach($systems as $system)
                                        <option value="{{ $system->id }}">
                                            {{ $system->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" required/>
                            </div>

                            <div class="form-group row">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start_date" required/>
                            </div>
                            <div class="form-group row">
                                <label>End Date</label>
                                <input type="date" class="form-control" name="end_date" required/>
                            </div>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('company.systems.index', $company_id) }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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