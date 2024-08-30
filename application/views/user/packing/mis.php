
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$qt->title;?> | Scan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">
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
          PULLING PART
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
              <li class="breadcrumb-item"><a href="<?=base_url('home?api='.$this->id_t);?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('pulling/mis?api='.$this->id_t);?>">Mis Scan</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content p-1" id="content">
      <!-- Default box -->
       <div class="card mb-1" style="height:100% !important;">
        <div class="card-body p-2" style="overflow:auto;height: calc(100vh - 125px);">
          <table style="width: 100%;height: 100%; border-collapse: collapse;border-spacing: 1px !important;border-color: #fff;">
            <tr>
              <td style="height:5%;" class="text-danger text-lg text-left p-1">
                <i class="fa fa-exclamation-triangle"></i> DATA MIS SCAN PULLING 
              </td>
            </tr>
            
            <tr>
              <td>
                <table border="1" style="height:100%;width: 100%;border-spacing:1px;margin:auto;border-color: #ccc;border-collapse: collapse;border:1px solid #eee">
                  
                  <tr>
                    <td style="text-align: right;padding: 3px;">
                      TRUE
                    </td>
                    <td style="text-align: left;padding: 3px;" class="text-success">
                      <?=$data_mis->part_no_true;?>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 30%;text-align: right;padding: 3px;">
                      FALSE
                    </td>
                    <td style="text-align: left;padding: 3px;" class="text-danger">
                      <?=$data_mis->part_no_false;?>
                    </td>
                  </tr> 
                  
                  <tr>
                    <td style="text-align: right;padding: 3px;">
                      PIC
                    </td>
                    <td style="text-align: left;padding: 3px;">
                      <?=$data_mis->scan_by;?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right;padding: 3px;">
                      TIME
                    </td>
                    <td style="text-align: left;padding: 3px;">
                      <?=$data_mis->scan_time;?>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>         
            <tr>
              <td style="vertical-align: top;text-align: right;height:50%">
                <?=form_open('pulling/submitmis?api='.$this->id_t, 'id="mydata1" ');?>
                <input id="csrf_sysx_name" type="hidden" name="csrf_sysx_name" value="<?=$this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="id" name="id" value="<?=$data_mis->id;?>" required="required"/>
                
               <table style="height:100%;width: 100%;border-spacing:1px;margin:auto;border-color: #ccc;border-collapse: collapse;border:1px solid #eee">
                   <tr>
                      <td colspan="2" class="text-left text-lg bg-light" style="height:8%;color:teal !important">  
                        * Form Confirmation       
                      </td>
                    </tr> 
                  <tr>
                    <td class="text-right" style="width: 30%;">
                      Problem
                    </td>
                    <td class="text-left">
                      <div class="form-group p-0 m-1">
                      <input type="text" id="problem" name="problem" class="form-control"  required="required">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-right border-0">
                     Pass. Leader
                    </td>
                    <td class="text-left border-0">
                      <div class="form-group p-0 m-1">
                        <input type="password" id="password" name="password" class="form-control"  required="required">
                      </div>
                    </td>
                  </tr>
                  <tr class="bg-light ">
                    <td></td>
                    <td class="text-left p-2">
                      <button type="submit" class="btn btn-outline-success text-bold"> Submit  </button>
                    </td>
                  </tr> 
                </table>
                <?=form_close();?>
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
  <footer class="main-footer text-sm mt-1">
    <div class="float-right d-none d-sm-block p-0 m-0">
      <b>Version</b> <?=$qt->version;?>
    </div>
    <strong>Copyright &copy; <?=$qt->year;?> <a href=""><?=$qt->owner;?></a></strong>
  </footer>
</div>
<script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?=base_url('assets/lte/sweetalert/sweetalert.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
   $("#loading").fadeOut("slow");
  }); 

$('#mydata1').submit(function(e){
    e.preventDefault();
     var fa = $(this);            
      $.ajax({
        url: fa.attr('action'),
        type: 'post' ,
        data: fa.serialize(),
        cache:false,
        dataType: 'json',
        success: function(response) {
          if(response.success == true) {
              swal({
                title: "Submit Success",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false
              });
              window.location.href ="<?=base_url('pulling/scan?api='.$this->id_t.'&po_no='.$t->po_no); ?>";  
          } else {
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
</body>
</html>
