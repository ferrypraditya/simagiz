<div class="modal-header">
  <h4 class="modal-title">Form Configuration</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  
  <div class="box">
    <div class="box-title text-lg text-info">
      START STOP AJS
    </div>
    <div class="box-body">
        <div id="psn1" class="text-center text-lg"></div>
          <table nowrap border="1" cellspacing="1" class="text-center table-border" style="width: 100%;border-color:#aaa">
          <thead >
            <tr style="background-color: #ccc">
              <th class="text-Center" width="10%">Shop</th>
              <th class="text-center">Last Update</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>          
          <tbody>
              <tr>
                   <td>
                    <?=$qc2->shop;?>
                   </td>
                   <td>
                    <?=$qc2->update_time;?>
                   </td>
                   <td style="padding: 2px">
                      <?php if($qc2->auto=='ON'){ ?> 
                      <label style="padding: 0px;margin: 0px;color: lime"><?=$qc2->auto;?></label>
                      <?php }else{ ?>
                      <label style="padding: 0px;margin: 0px;color: red"><?=$qc2->auto;?></label>
                      <?php } ?> 
                   </td>
                   <td style="padding: 2px">
                      <?php if($qc2->auto=='ON'){ ?> 
                       <button class="btn btn-danger btn-xs" onclick="startstop('2','OFF')">STOP</button> 
                      <?php }else{ ?>
                      <button class="btn btn-success btn-xs" onclick="startstop('2','ON')">START</button>
                      <?php } ?> 
                   </td>
                   
              </tr>
          </tbody>
        </table>
      </div>
    </div>
    
 </div>   
<script type="text/javascript"> 
function startstop(shop,auto){
 $("#psn1").text('');
 $("#psn1").removeClass('text-danger');
 $("#psn1").removeClass('text-success');          
          swal({
            title: "Are you sure?",
            text: "Set "+auto,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes',
            closeOnConfirm: true,
              //closeOnCancel: false
            },
            function(){
                
                  $.ajax({
                    type: "POST",
                    url : "<?=base_url('master/confajs?api='.$id_t); ?>",
                    dataType: 'json',
                    data:"<?=$this->security->get_csrf_token_name();?>="+cv+"&shop="+shop+"&auto="+auto,
                    cache:false,
                      success: function(data){        
                               $("#psn1").text(data.msg);  
                               if(data.status==true){
                                 $("#psn1").addClass('text-success');
                                  formconfajs();
                               }else{
                                 $("#psn1").addClass('text-danger');
                               }
                               
                                                     
                          }
                      
                  });
                
          });
      }
</script>
