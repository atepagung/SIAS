@extends('layouts.app')

@section('content')
<div class="container">

    <span id="testing"></span>

    <form class="form-horizontal" method="POST" action="{{ url('admin/create-role') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role" class="col-md-4 control-label">Roles</label>

            <div class="col-md-6">
                <input id="role" type="text" class="form-control" name="role" required>

                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
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