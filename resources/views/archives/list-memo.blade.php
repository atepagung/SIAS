@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header row">
        <div class="col-11">
            <i class="fa fa-table"></i> Arsip Memo
        </div>
        <div class="col-1">
            <a href="memo/add" class="btn btn-primary btn-sm">+</a>    
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nomor Surat</th>
                <th>Title</th>
                <th>Description</th>
                <th>Uploader</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nomor Surat</th>
                <th>Title</th>
                <th>Description</th>
                <th>Uploader</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($memos as $memo)
                <tr>
                  <td>{{ $memo['nomor_surat'] }}</td>
                  <td>{{ $memo['title'] }}</td>
                  <td>{{ $memo['description'] }}</td>
                  <td>{{ $memo['uploader']['name'] }}</td>
                  <td>
                      <div class="row">
                          <div class="col">
                              <a href="download/{{ $memo['id'] }}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                          </div>
                          <div class="col">
                              <a href="{{ url('/archive/memo').'/'.$memo['id'].'/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          </div>
                          <div class="col">
                              <a href="" class="btn btn-primary"><i class="fa fa-remove"></i></a>
                          </div>
                      </div>
                  </td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection

