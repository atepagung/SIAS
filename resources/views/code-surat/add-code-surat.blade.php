@extends('layouts.app')

@section('content')
<div class="container">

    <form class="form-horizontal" method="POST" action="{{ url('kode-surat/add') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
            <label for="code" class="col-md-4 control-label">Code Surat</label>

            <div class="col-md-6">
                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                @if ($errors->has('code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('judul_naskah') ? ' has-error' : '' }}">
            <label for="judul_naskah" class="col-md-4 control-label">Judul Naskah</label>

            <div class="col-md-6">
                <input id="judul_naskah" type="text" class="form-control" name="judul_naskah" required>

                @if ($errors->has('judul_naskah'))
                    <span class="help-block">
                        <strong>{{ $errors->first('judul_naskah') }}</strong>
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
