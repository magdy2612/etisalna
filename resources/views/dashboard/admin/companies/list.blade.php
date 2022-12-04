@extends('dashboard.base')
@section('content')
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>{{ __('Companies') }}</div>
            <div class="card-body">
              <div class="row">
                <a href="{{ route('companies.create') }}"
                   class="btn btn-primary m-2">{{ __('Add Company') }}</a>
              </div>
              <br>
              <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>CRM ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                  <tr>
                    <td>{{ $resource->crm_id }}</td>
                    <td>{{ $resource->name }}</td>
                    <td>
                      <a href="{{ route('company.systems.index', $resource->id) }}" class="btn btn-block btn-primary">
                        Systems
                      </a>
                    </td>
                    <td>
                      <a href="{{ url('/companies/' . $resource->id) }}" class="btn btn-block btn-primary">
                        View
                      </a>
                    </td>
                    <td>
                      <a href="{{ url('/companies/' . $resource->id . '/edit') }}"
                         class="btn btn-block btn-primary">
                        Edit
                      </a>
                    </td>
                    <td>
                      <form action="{{ route('companies.destroy', $resource->id ) }}" method="POST">
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
