
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-hover table-bordered nowrap compact" style="width:100%;font-size: 14px;">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%">Action</th>
                            <th>User Level</th>
                            <th>User Group</th>
                            <th>User Area</th>
                            <th>User Device</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($data_level as $key){ ?>
                        <tr>
                           <td class="text-center"><button type="button" class="btn btn-block btn-outline-success" onclick="detail_otorisasi('<?=$key->user_level;?>');">Update</button></td>
                           <td><?=$key->user_level;?></td>
                           <td><?=$key->user_group;?></td>
                           <td><?=$key->user_area;?></td>
                           <td><?=$key->user_device;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" id="view">
                 
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div> 
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 <script type="text/javascript">
   var tinggi = ($(window).height()-330);
    if(tinggi<150){
      var tinggi=150;
    }
$(document).ready(function() {
 $('#example').DataTable( {
          "processing": true, 
            "language": {
              'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="text-green">Processing ...</span> '
            }, 
          "serverSide": false, 
          "sort": true,
          "pageLength" :15,
          "lengthMenu":[ [10,15,20, 25, 50, -1], [10,15,20, 25, 50, "All"] ],
          "order": [], 
          "scrollY":tinggi,
          "scrollX":true,
          "scrollCollapse":true,
          "paging":true,
          "fixedColumns":false,
          "autoWidth": true,
          "lengthChange": true,
        });
 
}); 
$(window).resize(function(){
    var tinggi = ($(window).height()-330);
    if(tinggi<150){
      var tinggi=150;
    }
    $('#example').closest('.dataTables_scrollBody').css('height',tinggi);
  })
function detail_otorisasi(user_level){
      var cv='<?=$this->security->get_csrf_hash(); ?>';
          $.ajax({
              type: "POST",
              url : "<?=base_url('otorisasi/detail_otorisasi?api='.$id_t); ?>",
              data: "user_level="+user_level+"&<?=$this->security->get_csrf_token_name(); ?>="+cv,
              cache:false,
              success: function(data){
                    $("#view").html(data);
                    $("#myModal").modal('show');
              }
          });
      }
</script>     




