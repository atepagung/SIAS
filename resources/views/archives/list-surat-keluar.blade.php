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
                  @include('layouts.table', ['archives' => $lengkap, 'red' => 'surat-keluar'])
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
              @include('layouts.table', ['archives' => $nomor, 'red' => 'surat-keluar'])
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
                  @include('layouts.table', ['archives' => $review, 'red' => 'surat-keluar'])
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
          </div>
        </div>
</div>

@endsection

