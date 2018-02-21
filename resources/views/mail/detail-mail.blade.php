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
        <!-- <div class="col-1">
            <a href="{{ url('mail/reply').'/'.$mail_histories[0]['mail_id'] }}" class="btn btn-primary btn-sm" title="Balas"><i class="fa fa-reply"></i></a>    
        </div> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Subject</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Subject</th>
                <th>Isi</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($mail_histories as $mail)
                <tr>
                  <td>{{ $mail['user_pengirim']['name'] }}</td>
                  <td>{{ $mail['user_penerima']['name'] }}</td>
                  <td>{{ $subject }}</td>
                  <td>{{ $mail['note'] }}</td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      @if($mail_histories != NULL)
        @include('layouts.modal_delete', ['archive' => $mail_histories, 'action_delete' => url('mail/delete').'/', 'object' => 'mail'])
      @endif
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection