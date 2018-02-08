@extends('layouts.app')

@section('content')
<div class="container">

    <form class="form-horizontal" method="POST" action="/archive/surat-masuk/{{ $archive->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group{{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
            <label for="nomor_surat" class="col-md-4 control-label">Nomor Surat</label>

            <div class="col-md-6">
                <input id="nomor_surat" type="text" class="form-control" name="nomor_surat" required value="{{ $archive->nomor_surat }}">
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
                <input id="title" type="text" class="form-control" name="title" required value="{{ $archive->title }}">

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
                <textarea id="description" class="form-control" name="description" required>{{ $archive->description }}</textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
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
