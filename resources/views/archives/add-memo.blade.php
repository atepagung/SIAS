@extends('layouts.app')

@section('content')
<div class="container">

    <form class="form-horizontal" method="POST" action="/archive/memo" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
            <label for="nomor_surat" class="col-md-4 control-label">Nomor Surat</label>

            <div class="col-md-6">
                <input id="nomor_surat" type="text" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}" required autofocus>

                @if ($errors->has('nomor_surat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nomor_surat') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" required>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
                <textarea id="description" class="form-control" name="description" required></textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('archive') ? ' has-error' : '' }}">
            <label for="archive" class="col-md-4 control-label">Archive</label>

            <div class="col-md-6">
                <input type="file" name="archive">

                @if ($errors->has('archive'))
                    <span class="help-block">
                        <strong>{{ $errors->first('archive') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('akses') ? ' has-error' : '' }}">
            <label for="akses" class="col-md-4 control-label">Akses</label>

            <div class="col-md-6">
                
                <ul class="list-group" id="akses">

                    @foreach($penerima as $roles)
                        <li class="list-group-item">{{ $roles->title }}
                          <ul class="list-group">
                                @foreach($roles->sub_roles as $sub_roles)
                                    <li class="list-group-item">{{ $sub_roles->title }}
                                        <ul class="list-group">
                                            @foreach($sub_roles->users as $users)
                                                <li class="list-group-item">
                                                    <div class="">
                                                        <input type="checkbox" name="hak_akses[]" value="{{ $users->id }}">
                                                        <label class="form-check-label">
                                                            {{ $users->name }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                          </ul>
                        </li>      
                    @endforeach

                @if ($errors->has('akses'))
                    <span class="help-block">
                        <strong>{{ $errors->first('akses') }}</strong>
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
