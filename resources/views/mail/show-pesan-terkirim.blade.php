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
                <th>Kepada</th>
                <th>Subject</th>
                <th>Isi</th>
                <th>Files</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Kepada</th>
                <th>Subject</th>
                <th>Isi</th>
                <th>Files</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($mails as $mail)
                <tr>
                  <td>
                    @foreach($mail['mail_histories'] as $mail_historie)
                      {{ '['.$mail_historie['user_penerima']['name'].'] ' }}
                    @endforeach
                  </td>
                  <td>{{ $mail['subject'] }}</td>
                  <td>{{ $mail['mail_histories'][count($mail['mail_histories'])-1]['note'] }}</td>
                  <td>
                    <div class="row">
                      @foreach($mail->files as $files)
                        <div class="col">
                            <a href="{{ url('archive/download').'/'.$files['id'] }}" class="btn btn-success btn-sm" title="Download"><i class="fa fa-download"></i></a>
                        </div>
                      @endforeach
                    </div>
                  </td>
                  <td>
                      <div class="row">
                        
                          <div class="col">
                              <a href="{{ url('mail/detail-mail').'/'.$mail['id'] }}" class="btn btn-primary btn-sm"  title="Open Mail"><i class="fa fa-external-link"></i></a>
                          </div>
                          <div class="col">
                              <a class="btn btn-danger btn-sm" title="Delete" onclick="open_modal({{$mail['id']}}, 'mails')"><i class="fa fa-remove"></i></a>
                          </div>
                        
                      </div>
                  </td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      @if($mails != NULL)
        @include('layouts.modal_delete', ['archive' => $mails, 'action_delete' => url('mail/delete').'/', 'object' => 'mail'])
      @endif
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection