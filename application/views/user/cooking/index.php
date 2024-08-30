
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$qt->title;?> | Select</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/logo.jpg'); ?>" type="image/x-icon" />
  <link rel="stylesheet" href="<?=base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/lte/jquery/themes/blitzer/jquery-ui.css');?>">  
  <link rel="stylesheet" href="<?=base_url('assets/lte/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?=site_url('assets/lte/sweetalert/sweetalert.css');?>"/>
  <style type="text/css">
    html, body { 
      height: 100% !important;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: sans-serif;
      overflow-x: auto;
      overflow-y: auto;
      font-size: 12px;
      text-align: center;
    }
   #loading {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
      }
    .link{
         background-color: #c9c;
      }
      .link:hover,
      .link:focus,
      .link:active{
        background-color: #ccc;
        cursor: pointer;
      }
     .autocomplete-suggestions {
          border: 1px solid #999;
          background: #FFF;
          overflow: auto;

      }
      .autocomplete-suggestion {
          padding: 2px 5px;
          white-space: nowrap;
          overflow: hidden;
      }
      .autocomplete-selected {
          background: #F0F0F0;
      }
      .autocomplete-suggestions strong {
          font-weight: normal;
          color: #3399FF;
      }
      .autocomplete-group {
          padding: 2px 5px;
      }
      .autocomplete-group strong {
          display: block;
          border-bottom: 1px solid #000;
      }
  </style>
  <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?=date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script> 
</head>
<body onLoad="setInterval('displayServerTime()',100);" class="hold-transition sidebar-collapse layout-top-nav">
<div id="loading">
  <div class="d-flex justify-content-center">  
    <div class="spinner-grow text-primary" role="status" style="width: 3rem; height: 3rem; z-index: 20;">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand p-0 navbar-dark navbar-<?=$qt->thema;?>">
    <table border="1" style="height:100%;width: 100%;border-spacing: 0px;border-collapse: collapse;border-color: #fff;"> 
      <tr>
        <td style="width:50px;" class="bg-white">
          <img src="<?=base_url('assets/img/logo.jpg');?>" style="width:50px;height:35px;vertical-align: middle;">
        </td>
        <td style="height:5%;padding: 0px;font-size: 150%;vertical-align: middle;color:#fff" class="text-bold;">
          PROCESS COOKING
        </td>
        <td onclick="logout()" style="width: 40px;"  class="bg-white">
          <img src="<?=base_url('assets/img/logout.png');?>" style="width:40px;height:35px;vertical-align: middle;">
        </td>
      </tr>
    </table>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"   style="padding-top:0px !important;padding-bottom:0px !important;">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-8 text-left pl-0">
            <?=$this->nama;?>,
            <i><?=gmdate('Y-m-d',time()+60*60*7);?>&nbsp;<span id="clock"><?=date('H:i:s');?></span></i>
          </div>
          <div class="col-sm-4 pl-0">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" onclick="back()">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('cooking?api='.$this->id_t);?>">Select</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <section class="content p-1" id="content">
      <!-- Default box -->
      <div class="card" style="height:100% !important">
        <div class="card-header p-2">
          <div class="input-group">
            <input id="po_no" type="text" class="form-control text-center border-end-0 border border-success rounded-pill" name="po_no" style="padding:0px;height:30px;text-align: center;width: 99%" autocomplete="off" placeholder="Please input po_no">
          
            <button class="btn btn-success rounded-pill ml-1" onclick="pilih1()">Go</button>
          </div>
        </div>
        <div class="card-body p-1" style="overflow:scroll;">

          <table style="height:100%;width: 100%; border-collapse: separate;border-spacing: 2px !important;border-color: #fff;">         
            <tr>
              <td style="vertical-align:top" class="text-sm">

                
                <table border="1" id="mytable" style="width: 100%;text-align: left;border-spacing: 0px;border-collapse: collapse;border-color: #eee">
                    <thead>
                      
                      <tr style="background-color:#3c8dbc; color:white;height: 25px;">
                        <th>Customer</th>
                        <th>PO No</th>
                        <th>PO Qty</th>
                        <th>Pulling</th>
                        <th>Remain</th>
                        <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($qm as $key) {
                      ?>
                     <tr class="link">
                      <td><?=$key->customer;?></td>
                      <td><?=$key->po_no;?></td>
                      <td><?=$key->po_qty;?></td>
                      <td><?=$key->pulling;?></td>
                      <td><?=$key->remain;?></td>
                      <td class="text-center"><button class="btn btn-success btn-xs rounded-pill ml-1" onclick="pilih('<?=$key->po_no;?>')">Go</button></td>
                    </tr>
                    <?php 
                    $i=$i+1;
                      }
                      ?>
                    </tbody>
                  </table>
              </td>
            </tr>
          </table>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block p-0 m-0">
      <b>Version</b> <?=$qt->version;?>
    </div>
    <strong>Copyright &copy; <?=$qt->year;?> <a href=""><?=$qt->owner;?></a></strong>
  </footer>
</div>
<script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?=base_url('assets/lte/jquery/jquery-ui.js')?>"></script>
<script src="<?=base_url('assets/lte/sweetalert/sweetalert.js')?>"></script>
<script src="<?=base_url('assets/lte/jquery/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
cv='<?=$this->security->get_csrf_hash(); ?>';

$(document).ready(function() {
  $('#mytable').DataTable( {
        "dom": '<"top">rt<"bottom"ip><"clear">',
        "processing": true, 
        "serverSide": false, 
        "bSort": false,
        "pageLength" :25,
        "order": [], 
        "scrollY":true,
        "scrollX":false,
        "scrollCollapse":true,
        "paging":true,
        "fixedColumns":false,
        "AutoWidth": true,
        "LengthChange": false,
        "bLengthChange": false,
        "bInfo": true,
      });
 var tinggi = ($(window).height()-130);
   $('#content').css('height',tinggi);
   $("#loading").fadeOut("slow");
  }); 

$(window).resize(function(){
    var tinggi = ($(window).height()-130);
   $('#content').css('height',tinggi);
  })
function pilih(po_no){
  swal({
          title: "Are you sure?",
          text: "Select " +po_no,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes',
          closeOnConfirm: false,
          //closeOnCancel: false
        },
        function(){          
         window.location.href ="<?=base_url('cooking/scan?api='.$this->id_t.'&po_no='); ?>"+po_no+""; 
        });            
    }
$('#po_no').autocomplete({
    source: function (request, response) {
      $("#po_no").css({"color": "black","font-size": "12px"});
        $.getJSON("<?=base_url('cooking/searchpart');?>?query=" + request.term+"&api=<?=$this->id_t;?>", function (data) {
          //console.log(data);
            response($.map(data, function (value, key) {
                //console.log(value);
                return {
                    value: value.value
                };
            }));
        });
    },
    width: 300,
    max: 20,
    delay: 100,
    minLength: 1,
    autoFocus: true,
    cacheLength: 1,
    scroll: true,
    highlight: false,
    select: function(event, ui) {
      var po_no = ui.value;
     }
  });

function pilih1(){
  var po_no = $("#po_no").val();
  if(po_no){
  swal({
        title: "Are you sure?",
        text: "Select "+po_no,
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        closeOnConfirm: true,
        //closeOnCancel: false
      },
      function(){ 
        window.location.href ="<?=base_url('cooking/scan?api='.$this->id_t.'&po_no='); ?>"+po_no+""; 
      });  
  }
}
function back(){
        swal({
              title: "Are you sure?",
              text: "Home Page",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: 'btn-danger',
              confirmButtonText: 'Yes',
              closeOnConfirm: false,
                //closeOnCancel: false
              },
              function(){
               window.location.href ="<?=base_url().'?api='.$this->id_t;?>";
              });       
      } 

function logout(){
        swal({
            title: "Are you sure?",
            text: "Logout",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
              //closeOnCancel: false
            },
            function(){
             window.location.href ="<?=base_url('cooking/logout?api='.$this->id_t); ?>";
            });
      }

</script>

</body>
</html>
