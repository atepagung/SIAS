@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header row">
        <div class="col-11">
            @if(isset($title))
              <i class="fa fa-table"></i> <span id="title">{{ $title }}</span>
            @endif
        </div>
        <div class="col-1">
            <a href="{{ url('kode-surat/add') }}" class="btn btn-primary btn-sm">+</a>    
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Code Surat</th>
                <th>Judul Naskah</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Code Surat</th>
                <th>Judul Naskah</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($code_surat as $code)
                <tr>
                  <td>{{ $code['code'] }}</td>
                  <td>{{ $code['judul_naskah'] }}</td>
                  <td>
                      <div class="row">
                          <div class="col">
                              <a href="{{ url('kode-surat/edit').'/'.$code['id'] }}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          </div>
                          <div class="col">
                              <!-- <a href="{{ url('archive/delete'.'/'.$code['id']) }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-remove"></i></a> -->
                              <a class="btn btn-danger btn-sm" title="Delete" onclick="open_modal({{$code['id']}}, '{{ $red }}')"><i class="fa fa-remove"></i></a>
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

@if($code_surat != NULL)
  @include('layouts.modal_delete', ['action_delete' => url('kode-surat/delete').'/', 'object' => 'Kode Surat'])
@endif

@endsection

