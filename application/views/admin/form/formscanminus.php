<div class="modal-header">
  <h4 class="modal-title">Form Scan Minus Delivery</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  
  <div class="card">
      <?=form_open('master/scanminus?api='.$id_t, 'id="mydata"'); ?>
        <input id="csrf_sysx_name" type="hidden" name="csrf_sysx_name" value="<?=$this->security->get_csrf_hash(); ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Total Minus</label>
              <input class="form-control" type="text" name="jml" id="jml" value="<?=$qs->jml;?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Scan QrSeat</label>
              <input id="qrseat" type="text" class="form-control" name="qrseat" style="text-transform: uppercase;border:1px solid #9af;"  minlength="10"  required="required" autocomplete="off" onfocus="this.value=''" oninput="resethtml()">
            </div>
            <div class="form-group" id="hasil"></div>                        
          </div>
    <!-- /.box-body -->
          <div class="card-footer width-border">
            <button type="submit" class="btn btn-success"> Submit </button>
            <button type="button" class="btn btn-danger exit" data-dismiss="modal" aria-label="Close">Close</button>
          </div>
       <?=form_close();?>
    </div>
 </div>   
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
    $('#qrseat').focus();
}) 
function resethtml() {
  $("#hasil").html("");
  $('.form-group').removeClass('has-error').removeClass('has-success');
  $('.text-danger').remove();
}
$('#mydata').submit(function(e){
    e.preventDefault();
     var fa = $(this); 
      $.ajax({
        url: fa.attr('action'),
        type: 'post' ,
        data: fa.serialize(),
        dataType: 'json',
        success: function(response) {
          if(response.success == true){
              $('.form-group').removeClass('has-error')
                              .removeClass('has-success');
              $('.text-danger').remove();
              fa[0].reset();
              $("#hasil").html("<div class='badge badge-success text-bold text-lg'>Scan Success</div>");
              $("#qrseat").focus();
              $('#example').DataTable().ajax.reload();
              $("#jml").val(response.jml);
          }else{
            $.each(response.messages,function(key, value){
              var element = $('#' + key);
              element.closest('div.form-group')
              .removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              element.after(value);
            });
          }
        }
     });
  });
</script>
