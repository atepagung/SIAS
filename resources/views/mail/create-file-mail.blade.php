@extends('layouts.app')

@section('content')
<div class="container">

    <span id="testing"></span>

    <form class="form-horizontal" method="POST" action="{{ url('mail') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
            <label for="subject" class="col-md-4 control-label">Subject</label>

            <div class="col-md-6">
                <input id="subject" type="text" class="form-control" name="subject" required>

                @if ($errors->has('subject'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('isi_pesan') ? ' has-error' : '' }}">
            <label for="isi_pesan" class="col-md-4 control-label">Isi Pesan</label>

            <div class="col-md-6">
                <textarea id="isi_pesan" class="form-control" name="isi_pesan" required></textarea>

                @if ($errors->has('isi_pesan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('isi_pesan') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- <div class="form-group{{ $errors->has('mail_category') ? ' has-error' : '' }}">
            <label for="mail_category" class="col-md-4 control-label">Kategori</label>
        
            <div class="col-md-6">
                <select class="custom-select" id="inputGroupSelect01" name="mail_category">
                  @foreach($mail_category as $category)
                      <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                  @endforeach
                </select>
        
                @if ($errors->has('mail_category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mail_category') }}</strong>
                    </span>
                @endif
            </div>
        </div> -->

        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
            <label for="file" class="col-md-4 control-label">File</label>

            <div class="col-md-6">
                <input type="hidden" name="fileInput[]" value="{{ $file['id'] }}">

                <div id="divFile">
                    <p><strong>{{ $file['title'] }}</strong></p>
                </div>

                @if ($errors->has('file'))
                    <span class="help-block">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('penerima') ? ' has-error' : '' }}">
            <label for="penerima" class="col-md-4 control-label">Penerima</label>

            <div class="col-md-6">
                
                <ul class="list-group" id="penerima">

                    @foreach($penerima as $roles)
                        <li class="list-group-item">{{ $roles->title }}
                          <ul class="list-group">
                                @foreach($roles->sub_roles as $sub_roles)
                                    <li class="list-group-item">{{ $sub_roles->title }}
                                        <ul class="list-group">
                                            @foreach($sub_roles->users as $users)
                                                <li class="list-group-item">
                                                    <div class="">
                                                        <input type="checkbox" name="penerima[]" value="{{ $users->id }}">
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

                @if ($errors->has('penerima'))
                    <span class="help-block">
                        <strong>{{ $errors->first('penerima') }}</strong>
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