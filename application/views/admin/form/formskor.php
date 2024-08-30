<div class="row">
  <div class="col-6">
    &nbsp;
  </div>
  <div class="col-6">
    <div class="card">
    <?=form_open('master/submitkor?api='.$this->id_t, 'id="mydata"'); ?>
      <input type="hidden" name="col" value="<?=$col;?>"/>
      <input type="hidden" name="row" value="<?=$row;?>"/>
      <input type="hidden" name="pos" value="<?=$pos;?>"/>
      <input type="hidden" name="part_no" value="<?=$part_no;?>"/>
      <input type="hidden" name="csrf_sysx_name" value="<?=$this->security->get_csrf_hash(); ?>">
      <div class="card-header"></div>
      <div class="card-body">                               
          <div class="form-group">
            <label for="exampleInputEmail1">Input Position</label>
            <input id="position"  name="position" type="number" class="form-control col-6" max="<?=$max;?>" min="1" required>
          </div>                        
        </div>
    <!-- /.box-body -->
        <div class="card-footer width-border">
          <button type="submit" class="btn btn-success"> Submit </button>
        </div>
     </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#position').focus();  
$('#mydata').submit(function(e){
    var position = $("#position").val();
    e.preventDefault();
     var fa = $(this);            
      $.ajax({
        url: fa.attr('action'),
        type: 'post' ,
        data: fa.serialize(),
        dataType: 'json',
        success: function(response) {
          if(response.success == true){
              $('.card-header').text('Update Success');
              $('.card-header').addClass('text-success text-bold');
              $('.form-group').removeClass('has-error')
                              .removeClass('has-success');
              $('.text-danger').remove();
              fa[0].reset();
              formupdateview('x','<?=$pos;?>','<?=$part_no;?>','x');
              $('.card-header').addClass('text-success text-bold');
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
