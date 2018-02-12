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
      @include('layouts.table', ['archives' => $memos, 'red' => 'memo'])
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>

@endsection

