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
        @foreach($archives as $archive)
          <tr>
            <td>{{ $archive['nomor_surat'] }}</td>
            <td>{{ $archive['title'] }}</td>
            <td>{{ $archive['description'] }}</td>
            <td>{{ $archive['uploader']['name'] }}</td>
            <td>
                <div class="row">
                    <div class="col">
                        <a href="{{ url('archive/view').'/'.$archive['id'] }}" class="btn btn-primary btn-sm" target="_blank" title="Open"><i class="fa fa-external-link"></i></a>
                    </div>
                    <div class="col">
                        <a href="{{ url('archive/download').'/'.$archive['id'] }}" class="btn btn-success btn-sm" title="Download"><i class="fa fa-download"></i></a>
                    </div>
                    <div class="col">
                        <a href="{{ url('archive/surat-masuk').'/'.$archive['id'].'/edit' }}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                    </div>
                    <div class="col">
                        <a href="{{ url('mail/create').'/'.$archive['id'] }}" class="btn btn-info btn-sm" title="Send"><i class="fa fa-send"></i></a>
                    </div>
                    <div class="col">
                        <!-- <a href="{{ url('archive/delete'.'/'.$archive['id']) }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-remove"></i></a> -->
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="open_modal({{$archive['id']}}, '{{ $red }}')"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
            </td>
          </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@if($archives != NULL)
  @include('layouts.modal_delete', ['action_delete' => url('archive/delete').'/', 'object' => 'file'])
@endif