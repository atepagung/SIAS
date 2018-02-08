@extends('layouts.app')

@section('content')
<div class="container">
       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item"><a href="#lengkap" aria-controls="lengkap" role="tab" data-toggle="tab" class="nav-link active">Lengkap</a></li>
    <li role="presentation" class="nav-item"><a href="#butuh_nomor" aria-controls="butuh_nomor" role="tab" data-toggle="tab" class="nav-link">Butuh Nomor</a></li>
    <li role="presentation" class="nav-item"><a href="#review" aria-controls="review" role="tab" data-toggle="tab" class="nav-link">Review</a></li>
  </ul><br>   
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane container-fluid active" id="lengkap">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header row">
                    <div class="col-11">
                        <i class="fa fa-table"></i> Lengkap
                    </div>
                    <div class="col-1">
                        <a href="surat-keluar/add" class="btn btn-primary btn-sm">+</a>    
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
                          @foreach($lengkap as $complete)
                            <tr>
                              <td>{{ $complete['nomor_surat'] }}</td>
                              <td>{{ $complete['title'] }}</td>
                              <td>{{ $complete['description'] }}</td>
                              <td>{{ $complete['uploader']['name'] }}</td>
                              <td>
                                  <div class="row">
                                      <div class="col">
                                          <a href="download/{{ $complete['id'] }}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                      </div>
                                      <div class="col">
                                          <a href="{{ url('/archive/surat-keluar').'/'.$complete['id'].'/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
          <div role="tabpanel" class="tab-pane container-fluid" id="butuh_nomor">
            <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header row">
                <div class="col-11">
                    <i class="fa fa-table"></i> Butuh Nomor
                </div>
                <div class="col-1">
                    <a href="surat-keluar/add" class="btn btn-primary btn-sm">+</a>    
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
                      @foreach($nomor as $numb)
                        <tr>
                          <td>{{ $numb['nomor_surat'] }}</td>
                          <td>{{ $numb['title'] }}</td>
                          <td>{{ $numb['description'] }}</td>
                          <td>{{ $numb['uploader']['name'] }}</td>
                          <td>
                              <div class="row">
                                  <div class="col">
                                      <a href="download/{{ $numb['id'] }}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                  </div>
                                  <div class="col">
                                      <a href="{{ url('/archive/surat-keluar').'/'.$numb['id'].'/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
          <div role="tabpanel" class="tab-pane container-fluid" id="review">
            <!-- Example DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header row">
                    <div class="col-11">
                        <i class="fa fa-table"></i> Review
                    </div>
                    <div class="col-1">
                        <a href="surat-keluar/add" class="btn btn-primary btn-sm">+</a>    
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
                          @foreach($review as $rev)
                            <tr>
                              <td>{{ $rev['nomor_surat'] }}</td>
                              <td>{{ $rev['title'] }}</td>
                              <td>{{ $rev['description'] }}</td>
                              <td>{{ $rev['uploader']['name'] }}</td>
                              <td>
                                  <div class="row">
                                      <div class="col">
                                          <a href="download/{{ $rev['id'] }}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                      </div>
                                      <div class="col">
                                          <a href="{{ url('/archive/surat-keluar').'/'.$rev['id'].'/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
        </div>
</div>

@endsection

