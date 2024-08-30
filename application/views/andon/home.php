<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu | Andon</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=site_url('assets/lte/bootstrap/css/bootstrap.min.css');?>"/>
  <link rel="stylesheet" href="<?=site_url('assets/lte/sweetalert/sweetalert.css') ?>"/>
  <link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg');?>" type="image/x-icon" />
  <style type="text/css">
   html,body { 
      height: 100%;
      width: 100%;
      padding:0.5px;
      margin:0px;
      font-family: sans-serif;
      background-color:teal;
      
    }
    .bg-gray {
        color: #000;
        background-color: #d2d6de !important;
      }
      .bg-gray-light {
        background-color: #f7f7f7;
      }
      .bg-black {
        background-color: #111111 !important;
        color: white;
      }
      .bg-red,
      .callout.callout-danger,
      .alert-danger,
      .alert-error,
      .label-danger,
      .modal-danger .modal-body {
        background-color: #dd4b39 !important;
        color: white;
      }
      .bg-yellow,
      .callout.callout-warning,
      .alert-warning,
      .label-warning,
      .modal-warning .modal-body {
        background-color: #f39c12 !important;
        color: white;
      }
      .bg-aqua,
      .callout.callout-info,
      .alert-info,
      .label-info,
      .modal-info .modal-body {
        background-color: #00c0ef !important;
        color: white;
      }
      .bg-blue {
        background-color: #0073b7 !important;
        color: white;
      }
      .bg-light-blue,
      .label-primary,
      .modal-primary .modal-body {
        background-color: #3c8dbc !important;
        color: white;
      }
      .bg-green,
      .callout.callout-success,
      .alert-success,
      .label-success,
      .modal-success .modal-body {
        background-color: #00a65a !important;
        color: white;
      }
      .bg-navy {
        background-color: #001f3f !important;
      }
      .bg-teal {
        background-color: #39cccc !important;
      }
      .bg-olive {
        background-color: #3d9970 !important;
      }
      .bg-lime {
        background-color: #01ff70 !important;
      }
      .bg-orange {
        background-color: orange !important;
      }
      .bg-fuchsia {
        background-color: #f012be !important;
      }
      .bg-purple {
        background-color: #605ca8 !important;
      }
      .bg-maroon {
        background-color: #d81b60 !important;
      }
      .bg-gray-active {
        color: #000;
        background-color: #b5bbc8 !important;
      }
      .bg-black-active {
        background-color: #000000 !important;
      }
      .bg-red-active,
      .modal-danger .modal-header,
      .modal-danger .modal-footer {
        background-color: #d33724 !important;
      }
      .bg-yellow-active,
      .modal-warning .modal-header,
      .modal-warning .modal-footer {
        background-color: #db8b0b !important;
      }
      .bg-aqua-active,
      .modal-info .modal-header,
      .modal-info .modal-footer {
        background-color: #00a7d0 !important;
      }
      .bg-blue-active {
        background-color: #005384 !important;
      }
      .bg-light-blue-active,
      .modal-primary .modal-header,
      .modal-primary .modal-footer {
        background-color: #357ca5 !important;
      }
      .bg-green-active,
      .modal-success .modal-header,
      .modal-success .modal-footer {
        background-color: #008d4c !important;
      }
      .bg-navy-active {
        background-color: #001a35 !important;
      }
      .bg-teal-active {
        background-color: #30bbbb !important;
      }
      .bg-olive-active {
        background-color: #368763 !important;
      }
      .bg-lime-active {
        background-color: #00e765 !important;
      }
      .bg-orange-active {
        background-color: #ff7701 !important;
      }
      .bg-fuchsia-active {
        background-color: #db0ead !important;
      }
      .bg-purple-active {
        background-color: #555299 !important;
      }
      .bg-maroon-active {
        background-color: #ca195a !important;
      }
      [class^="bg-"].disabled {
        opacity: 0.65;
        filter: alpha(opacity=65);
      }
      .text-red {
        color: #dd4b39 !important;
      }
      .text-yellow {
        color: #f39c12 !important;
      }
      .text-aqua {
        color: #00c0ef !important;
      }
      .text-blue {
        color: #0073b7 !important;
      }
      .text-black {
        color: #111111 !important;
      }
      .text-light-blue {
        color: #3c8dbc !important;
      }
      .text-green {
        color: #00a65a !important;
      }
      .text-gray {
        color: #d2d6de !important;
      }
      .text-navy {
        color: #001f3f !important;
      }
      .text-teal {
        color: #39cccc !important;
      }
      .text-olive {
        color: #3d9970 !important;
      }
      .text-lime {
        color: #01ff70 !important;
      }
      .text-orange {
        color: #ff851b !important;
      }
      .text-fuchsia {
        color: #f012be !important;
      }
      .text-purple {
        color: #605ca8 !important;
      }
      .text-maroon {
        color: #d81b60 !important;
      }
      .text-white {
        color: #fff !important;
      }
    .btn {
      border-radius: 3px;
      -webkit-box-shadow: none;
      box-shadow: none;
      border: 1px solid transparent;
      }
    .btn.uppercase {
      text-transform: uppercase;
    }
    .btn.btn-flat {
      border-radius: 0;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      border-width: 1px;
    }
    .btn:active {
      -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      -moz-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn:focus {
      outline: none;
    }
    .btn-default {
      background-color: #f4f4f4;
      color: #444;
      border-color: #ddd;
    }
    .btn-default:hover,
    .btn-default:active,
    .btn-default.hover {
      background-color: #e7e7e7;
    }
    .btn-primary {
      background-color: #3c8dbc;
      border-color: #367fa9;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.hover {
      background-color: #367fa9;
    }
    .btn-success {
      background-color: #00a65a;
      border-color: #008d4c;
    }
    .btn-success:hover,
    .btn-success:active,
    .btn-success.hover {
      background-color: #008d4c;
    }
    .btn-info {
      background-color: #00c0ef;
      border-color: #00acd6;
    }
    .btn-info:hover,
    .btn-info:active,
    .btn-info.hover {
      background-color: #00acd6;
    }
    .btn-danger {
      background-color: #dd4b39;
      border-color: #d73925;
    }
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger.hover {
      background-color: #d73925;
    }
    .btn-warning {
      background-color: #f39c12;
      border-color: #e08e0b;
    }
    .btn-warning:hover,
    .btn-warning:active,
    .btn-warning.hover {
      background-color: #e08e0b;
    }
    .btn-outline {
      border: 1px solid #fff;
      background: transparent;
      color: #fff;
    }
    .btn-outline:hover,
    .btn-outline:focus,
    .btn-outline:active {
      color: rgba(255, 255, 255, 0.7);
      border-color: rgba(255, 255, 255, 0.7);
    }
    .btn-link {
      -webkit-box-shadow: none;
      box-shadow: none;
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
    setInterval('displayServerTime()',100);
</script> 
</head>
<body>
<table style="height:100%;width: 100%;border:1px solid #fff;color: #fff"> 
      <tr style="background-color: #fff;color: #000">
        <td style="border:1px solid #fff;width:40px;padding: 0px;height: 30px;">
          <a href="<?=base_url('andon');?>">
            <img src="<?=base_url('assets/img/logo.jpg');?>" style="width:35px;height:30px;margin:0px;">
          </a>
        </td>
        <td style="text-align: left;vertical-align: middle;padding-left: 3px;">
            <div style="font-size: 14px;font-weight: bold;margin-bottom: 0px;"><?=$detail;?></div>
            <div style="font-size: 12px;margin-top: -3px;"><?=gmdate('d-m-Y',time()+60*60*7);?> <span id="clock"><?=date('H:i:s');?></span> </div>
        </td>
        <td style="width: 40px;padding: 0px;">
        </td>   
      </tr>
      <tr>
        <td colspan="3" style="text-align: center;">
          <table style="width: 100%;font-weight: bold;text-shadow: 2px 2px #000">
            <tr>
              <td style="text-align: center;padding-left: 20%;padding-right: 20%;text-align: center;text-shadow: 4px 4px #000">
                <h1>MENU ANDON</h1>
                
              </td>
            </tr>
            <?php foreach ($data_andon as $key) { if($key->child!='-'){ ?>
              <tr>
              <td style="text-align: center;padding-left: 20%;padding-right: 20%;text-align: center;height: 40px;">
                <a onclick="window.open ('<?=site_url($key->url)?>','','fullscreen=yes, scrollbars=auto'); window.open('','_parent','');" style="color: #fff"><label class="btn btn-outline bg-black" style="width: 200px;"><?=$key->nav;?> </a>
              </td>
            </tr>
            <?php }} ?>
            <tr>
              <td style="text-align: center;padding-left: 20%;padding-right: 20%;text-align: center;height: 50px;text-shadow: 0px 0px #000">
                <i>to display andon fullscreen please enter F11</i>
              </td>
            </tr>  
          </table>
        </td>
      </tr>
      <tr height="5%">
        <td colspan="3" style="background-color: #fff;color: #000;text-align: center;padding: 3px;">
                <b>Version</b> <?=$version;?>
              <strong>Copyright &copy; <?=$year;?> <a href=""><?=$owner;?></a>.</strong> All rights
              reserved.
        </td>
      </tr>  
</table>
<!-- jQuery 2.2.3 -->
<script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
</body>
</html>
