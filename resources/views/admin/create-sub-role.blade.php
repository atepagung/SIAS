@extends('layouts.app')

@section('content')
<div class="container">

    <span id="testing"></span>

    <form class="form-horizontal" method="POST" action="{{ url('admin/create-sub-role') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('sub_role') ? ' has-error' : '' }}">
            <label for="sub_role" class="col-md-4 control-label">Sub Roles</label>

            <div class="col-md-6">
                <input id="sub_role" type="text" class="form-control" name="sub_role" required>

                @if ($errors->has('sub_role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_role') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
            <label for="roles" class="col-md-4 control-label">Roles</label>

            <div class="col-md-6">
                <!-- <textarea id="roles" class="form-control" name="roles" required></textarea> -->
                <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect01" name="role">
                    @foreach($roles as $role)
                        <option value="{{ $role['id'] }}">{{ $role['title'] }}</option>
                    @endforeach
                  </select>
                </div>

                @if ($errors->has('roles'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roles') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

@endsection