<div class="modal-header">
  <h4 class="modal-title">Form Add Manual Seat<small><code><br>* Label Seat Ready Shipping</code></small></h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  
  <div class="box">
      <?=form_open('master/addseat?api='.$this->id_t, 'id="mydata"'); ?>
        <input type="hidden" name="csrf_sysx_name" value="<?=$this->security->get_csrf_hash(); ?>">
          <div class="box-body">
            <div class="form-group">
              <label>Pilih Seat</label>
              <select class="form-control text-bold" name="item" id="item" required="required">
                    <option value=""></option>
                    <option value="All">All Item</option>
                  <?php foreach ($qseat as $key) { ?>
                    <option value="<?=$key->seat_code.'_'.$key->side;?>"><?=$key->seat_code.' '.$key->side;?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Suffix</label>
              <input id="suffix" type="text" class="form-control" name="suffix" style="text-transform: uppercase;border:1px solid #9af;"  minlength="2" maxlength="2"  requireds autocomplete="off">
            </div>                        
          </div>
    <!-- /.box-body -->
          <div class="box-footer width-border">
            <button type="submit" class="btn btn-success"> Submit </button>
          </div>
       <?=form_close();?>
    </div>
 </div>   
<script type="text/javascript"> 
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
            swal({
                title: "Success!!",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false
              });
                  $('.form-group').removeClass('has-error')
                                  .removeClass('has-success');
                  $('.text-danger').remove();
                  fa[0].reset();
                  //$("#myModal").modal('hide');
                  $('#example').DataTable().ajax.reload();
          
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
