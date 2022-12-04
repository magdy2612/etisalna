@extends('dashboard.base')
@section('content')
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>{{ __('Company System Users') }}</div>
            <div class="card-body">
              <div class="row">
                <a href="{{ route('company.system.users.create', $company_system_id) }}"
                   class="btn btn-primary m-2">{{ __('Add System User To Company') }}</a>
              </div>
              <br>
              <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                  <tr>
                    <td>{{ $resource['user']->name }}</td>
                    <td>{{ $resource->username }}</td>
                    <td>{{ $resource->password }}</td>
                    <td>
                      <a href="{{ route('company.system.users.edit', [$company_system_id, $resource->id]) }}"
                         class="btn btn-block btn-primary">
                        Edit
                      </a>
                    </td>
                    <td>
                      <form action="{{ route('company.system.users.destroy', [$company_system_id, $resource->id] ) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-block btn-danger">Remove</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
@endsection
