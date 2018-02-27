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
        <div class="col-1">
            <a href="{{ url('admin/create-sub-role') }}" class="btn btn-primary btn-sm">+</a>    
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Role</th>
                <th>Sub Role</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Role</th>
                <th>Sub Role</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($sub_roles as $sub_role)
                <tr>
                  <td>{{ $sub_role['role']['title'] }}</td>
                  <td>{{ $sub_role['title'] }}</td>
                  <td>
                      <div class="row">
                        @if($sub_role['id'] != 1 && $sub_role['id'] != 2)
                          <div class="col">
                              <a href="{{ url('admin/change-sub_role').'/'.$sub_role['id'] }}" class="btn btn-primary btn-sm"  title="Edit sub_role"><i class="fa fa-edit"></i></a>
                          </div>
                          <!-- <div class="col">
                              <a class="btn btn-danger btn-sm" title="Delete" onclick="open_modal({{$sub_role['id']}}, 'sub_roles')"><i class="fa fa-remove"></i></a>
                          </div> -->
                        @endif
                      </div>
                  </td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- @if($sub_roles != NULL)
        @include('layouts.modal_delete', ['archive' => $sub_roles, 'action_delete' => url('admin/delete-sub-role').'/', 'object' => 'sub role'])
      @endif -->
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection