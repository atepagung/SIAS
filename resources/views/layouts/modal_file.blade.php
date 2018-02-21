
  <!-- Modal -->
  <div class="modal fade" id="fileModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 800px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="modal_body">Pilih File:</p>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Pilih</th>
                    <th>Nomor Surat</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Uploader</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Pilih</th>
                    <th>Nomor Surat</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Uploader</th>
                    <th>Type</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($archives as $archive)
                    <tr>
                      <td><input type="checkbox" name="arsip[]" value="{{ $archive['id'] }}" data-name="{{ $archive['title'] }}"></td>
                      <td>{{ $archive['nomor_surat'] }}</td>
                      <td>{{ $archive['title'] }}</td>
                      <td>{{ $archive['description'] }}</td>
                      <td>{{ $archive['uploader']['name'] }}</td>
                      <td>{{ $archive['file_category']['title'] }}</td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <span class="btn btn-primary" onclick="oke()">OK</span> -->
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="oke()">OK</button>
        </div>
      </div>
      
    </div>
  </div>

<script>

    /*$("#fileBtn").click(function(){
        $("#fileModal").modal();
    });*/
    function open_modal() {
      $("#fileModal").modal();
      //$("#modal_header").text(id);
      //$("#redirect").attr("value", redirect);
      
      //$("#modal_body").text(redirect);
    }

    function oke() {
      /*var waha = document.createTextNode("are you OK?");
      $("#divFile").append(waha);
      
      $("#testing").text($('#arsips').val());*/

      $("#divFile").empty();

      $("input[name='arsip[]']").each(function() {
        if ($(this).is(":checked")) {
          var label = "<p><strong>"+$(this).data("name")+"</strong></p>";
          var x = "<input type='hidden' value='"+$(this).val()+"' name='fileInput[]'>";
          $("#divFile").append(label);
          $("#divFile").append(x);
        }
      });
    }
</script>

<script>
  
  
</script>