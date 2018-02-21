@extends('layouts.app')

@section('content')
{{ Auth::user()->sub_role->title }}
<div class="container">

    <form class="form-horizontal" method="POST" action="{{ url('/admin/update-role').'/'.$user->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
            <label for="roles" class="col-md-4 control-label">Roles</label>

            <div class="col-md-6">
                
                <ul class="list-group" id="roles">

                    @foreach($roles as $role)
                        <li class="list-group-item">{{ $role->title }}
                          <ul class="list-group">
                                @foreach($role->sub_roles as $sub_roles)
                                    <li class="list-group-item">
                                        <div class="">
                                            @if($user->sub_role->title == $sub_roles->title && $user->sub_role->role->title == $role->title)
                                                <input type="radio" name="role" value="{{ $sub_roles->id }}" checked>
                                            @else
                                                <input type="radio" name="role" value="{{ $sub_roles->id }}">
                                            @endif
                                            <label class="form-check-label">
                                                {{ $sub_roles->title }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                          </ul>
                        </li>      
                    @endforeach

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
