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
                        <form method="POST" action="{{ route('company.system.users.store', $company_system_id) }}">
                            @csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required/>
                            </div>

                            <div class="form-group row">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" required/>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('company.system.users.index', $company_system_id) }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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