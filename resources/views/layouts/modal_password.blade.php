
  <!-- Modal -->
  <div class="modal fade" id="modalPass" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="modal_body">Apa anda yakin ingin mengganti password akun ini?</p>
          <form action="" method="POST" id="form-password">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" id="red" name="redirect">
            <input type="password" name="password" required>
            <input type="password" name="password_confirmation" required>
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
    function open_pass(id, redirect) {
      $("#modalPass").modal();
      //$("#modal_header").text(id);
      $("#red").attr("value", redirect);
      $("#form-password").attr("action", "{{ url('admin/update-password').'/' }}"+id);
      //$("#modal_body").text(redirect);
    }

</script>