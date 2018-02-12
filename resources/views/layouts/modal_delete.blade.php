
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="modal_body">Apa anda yakin ingin menghapus file ini?</p>
          <form action="{{ url('archive/delete'.'/'.$archive['id']) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" id="redirect" name="redirect">
            <input type="submit" value="yakin" class="btn btn-danger">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script>

    /*$("#myBtn").click(function(){
        $("#myModal").modal();
    });*/
    function open_modal(id, redirect) {
      $("#myModal").modal();
      //$("#modal_header").text(id);
      $("#redirect").attr("value", redirect);
      //$("#modal_body").text(redirect);
    }

</script>