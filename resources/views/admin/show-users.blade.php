@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->has('password'))
      <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
  @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header row">
        <div class="col-11">
            @if(isset($title))
              <i class="fa fa-table"></i> <span id="title">{{ $title }}</span>
            @endif
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Sub Role</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Sub Role</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user['username'] }}</td>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user['sub_role']['title'] }}</td>
                  <td>{{ $user['sub_role']['role']['title'] }}</td>
                  <td>
                      <div class="row">
                          <div class="col">
                              <a href="{{ url('admin/change-role').'/'.$user['id'] }}" class="btn btn-primary btn-sm"  title="Edit Role"><i class="fa fa-edit"></i></a>
                          </div>
                          <div class="col">
                              <a class="btn btn-warning btn-sm" title="Edit Password" onclick="open_pass({{ $user['id'] }}, 'users')"><i class="fa fa-key"></i></a>
                          </div>
                          <div class="col">
                              <a class="btn btn-danger btn-sm" title="Delete" onclick="open_modal({{$user['id']}}, 'users')"><i class="fa fa-remove"></i></a>
                          </div>
                      </div>
                  </td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      @if($users != NULL)
        @include('layouts.modal_delete', ['archive' => $users, 'action_delete' => url('admin/delete').'/', 'object' => 'user'])
      @endif

      @if($users != NULL)
        @include('layouts.modal_password')
      @endif
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection