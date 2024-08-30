
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Autoso</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.jpg'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?=base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/lte/dist/css/adminlte.min.css');?>">
    <style type="text/css">
    :root {
        color-scheme: dark;
    }

    html,
    body {
        height: 100%;
        width: 100%;
        padding: 0px;
        margin: 0px;
        font-family: sans-serif;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        letter-spacing: -0.05rem !important;
        background-color: #fff;

    }

    @media (max-width: 899px) {
        .header {
            font-size: 8px;
        }

        .content {
            font-size: 6px;

        }
    }

    @media (min-width: 900px) {
        .header {
            font-size: 14px;
        }

        .content {
            font-size: 8px;

        }
    }

    div.dataTables_filter {
      text-align: right;
        margin-bottom: 2px;
        color: black;
    }

    table,
    tr,
    td {
        padding: 0px;

    }

    .link:hover {
        background-color: #300bbb !important;
        cursor: pointer;
        color: black;
    }

    .dataTables_scrollBody {
        overflow-x: hidden !important;
        overflow-y: auto !important;
    }

    .text-left {
      text-align: left;
    }

    .text-green {
        color: #444;
    }

    .dataTables_wrapper .dataTables_processing {
        position: absolute;
      text-align: center;
        font-size: 1.2em;
        background: white;
        opacity: 0.7;
        width: 200px;
        height: 15px;
        padding: 2px;
        margin: auto;
    }

    .table-data tr {
        background-color: #222 !important;
        color: #fff;
        height: 30px;
    }

    .table-data tr:nth-child(even) {
        background-color: #333 !important;
        color: #fff;
    }



    /* BLINK */


    @keyframes invalid {
        from {
            background-color: #FF3B30;
            color: #dedede;
        }

        to {
            background-color: inherit;
            color: #dedede;
        }
    }

    .red {
        background-color: #FF3B30 !important;
        color: #111 !important;

    }


    .yellow {
        background-color: #FF9F0A !important;
        color: #111 !important;
    }

    .green {
        background-color: #30D158 !important;
        color: #111 !important;
    }

    .grey {
        background-color: #bebebe !important;
        color: #111 !important;

        background-image: radial-gradient(circle at center,
                black 0.06rem,
                transparent 0);
        background-size: 0.25rem 0.25rem;
        background-repeat: round;
    }

    .success {
        background-color: #081C0D;
        color: #30D158;

        background-image: radial-gradient(circle at center,
                black 0.06rem,
                transparent 0);
        background-size: 0.25rem 0.25rem;
        background-repeat: round;
    }

    .halftone {
        background-image: radial-gradient(circle at center,
                black 0.06rem,
                transparent 0);
        background-size: 0.25rem 0.25rem;
        background-repeat: round;
    }

    .invalid {
        -webkit-animation: invalid 1s infinite;
        /* Safari 4+ */
        -moz-animation: invalid 1s infinite;
        /* Fx 5+ */
        -o-animation: invalid 1s infinite;
        /* Opera 12+ */
        animation: invalid 0.5s infinite;
        /* IE 10+ */
    }

    /* CSS UNTUK PART PO */
    table#part-po tr:nth-child(even) {
        background-color: #111;
        color: #dedede;
        height: 30px;
        font-size: 150%;

    }

    table#part-po tr:nth-child(odd) {
        background-color: #111;
        height: 30px;
        font-size: 150%;

    }

    table#part-po thead {
        position: sticky;
        top: 0;
    }


    .table-responsive {
        height: 100%;
        overflow: auto;
        position: sticky;
        top: 0;
        background-color: #fff;
    }

    #blink {
      text-align: center;
        background: red;
        color: #F00;
        margin: 0 auto;
        padding: 15px;
        border: 1px solid red;
        width: 80%;
        box-shadow: 5px 10px 5px red;
        border-radius: 15px;
    }

    #blink span {
        font-size: 2em;
        font-weight: bold;
        display: block;
        font-family: arial;
    }

    .link:hover {
        background-color: #30bbbb !important;
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

    .bg-lime {
        background-color: lime !important;
        color: black !important;
    }

    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
    .green {
        background-color: #00DD8D;
        color: #000;
    }

    .halftone {
        background-image: radial-gradient(circle at center,
                purple 0.06rem,
                transparent 0);
        background-size: 0.25rem 0.25rem;
        background-repeat: round;
    }

    /* BLINK */

    @keyframes invalid {
        from {
            background-color: yellow;
            color: #111;
        }

        to {
            background-color: inherit;
            color: #111;
        }
    }

    .invalid {
        -webkit-animation: invalid 1s infinite;
        /* Safari 4+ */
        -moz-animation: invalid 1s infinite;
        /* Fx 5+ */
        -o-animation: invalid 1s infinite;
        /* Opera 12+ */
        animation: invalid 0.5s infinite;
        /* IE 10+ */
    }

    @keyframes mis {
        from {
            background-color: red;
            color: #000;
        }

        to {
            background-color: inherit;
            color: #fff;
        }
    }

    .mis {
        -webkit-animation: mis 1s infinite;
        /* Safari 4+ */
        -moz-animation: mis 1s infinite;
        /* Fx 5+ */
        -o-animation: mis 1s infinite;
        /* Opera 12+ */
        animation: mis 0.5s infinite;
        /* IE 10+ */
    }
    </style>

    <!-- Ionicons -->
    <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime() {
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
        $("#clock").text((sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length ==
            1 ? "0" + ss : ss));
    }
    </script>
</head>

<body onLoad="setInterval('displayServerTime()',500);">
    <table border="0" style="width: 100%; height: 100%; border-collapse: collapse; background-color: #efefef;">
        <tr>
            <td style="padding: 1px;">
                <table border="0" style="width: 100%; height: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 100%; height: 7%;padding: 4px;" class="header">
                            <table border="1" style="width: 100%; height: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="width: 75px;text-align: center; font-weight: bold;">
                                        <a href=""><img src="<?=base_url('assets/img/logo.jpg');?>" style="width:100px;height:65px;vertical-align: middle;"></a>
                                    </td>
                                    <td style="font-size: 300%; text-align: center; font-weight: bold;line-height: 100%;">
                                        ANDON AJS AUTO DOWNLOAD
                                    </td>
                                    <td style="padding: 0px;width: 25%;font-size:180%;line-height: 100%; ">
                                      <table border="0"
                                            style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;margin: 0px;">
                                            <tr>
                                                <td
                                                    style="padding: 0px;text-align: center; font-weight: bold">
                                                    <?=gmdate('d-m-Y',time()+60*60*7);?> <span
                                                        id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;border-top:1px solid #999">
                                                    ADM KAP A2
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:2px;vertical-align: top;" class="content">
                         <section class="content p-0 mb-0" id="content">
                            <!-- Default box -->
                              <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="card text-lg text-left p-2 m-0">
                                        <div class="card-header text-left p-1 m-0">
                                          <h2 class="p-0 m-0">Form Confirm Problem A<?=$qh->shop;?></h2>
                                        </div>
                                        <code>*Cek antara Current Sliporder dengan Last Sliporder</code>
                                        <code>*Jika Problem Jumping dikonfirmasi maka <b>Current Sliporder</b> akan masuk ke JSS</code>
                                        <code>*Konfirmasi dengan Team IT jika ada masalah</code>
                                        <?=form_open('andon/submitconfirmso?api='.time(), 'id="mydata"'); ?>
                                          <div class="card-body text-left p-2 m-0">
                                            <input type="hidden" name="csrf_sysx_name" value="<?=$this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="id" value="<?=$qh->id;?>">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                  <label>Problem</label>
                                                  <input id="problem" type="text" class="form-control" name="problem"  required autocomplete="off" value="<?=$qh->problem;?>" readonly>
                                                </div>
                                                <div class="form-group col-6">
                                                  <label>Time Problem</label>
                                                 <input id="time_problem" type="text" class="form-control" name="time_problem" required autocomplete="off" value="<?=$qh->problem_time;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                  <label class="text-orange">Current Sliporder</label>(current file txt ajs)
                                                  <input id="sliporder" type="text" class="form-control" name="sliporder" required autocomplete="off" value="<?=$qh->sliporder.'|'.$qh->lifting.'|'.$qh->suffix;?>" readonly>
                                                </div>
                                                <div class="form-group col-6">
                                                  <label class="text-success">Last Sliporder</label>(last data input jss)
                                                 <input id="data_last" type="text" class="form-control" name="data_last" required autocomplete="off" value="<?=$qh->data_last;?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label>Confirmation Problem</label>
                                              <input id="remarks" type="text" class="form-control" name="remarks" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                              <label>Username</label>
                                              <input id="username" type="text" class="form-control" name="username" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                              <label>Password</label>
                                              <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                                            </div>
                                          </div>                        
                                        <!-- /.box-body -->
                                          <div class="card-footer width-border m-0 p-2">
                                            <button type="submit" class="btn btn-success"> Submit </button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="cancel()">Cancel</button>
                                             <span id="result" class="p-2 m-2"></span>
                                          </div>
                                        <?=form_close();?>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </section>
                          
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        
    </table>
    <script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
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
                      $("#result").text('Update Success...');
                      $("#result").addClass('bg-green');
                      $('.form-group').removeClass('has-error')
                                      .removeClass('has-success');
                      $('.text-danger').remove();
                      fa[0].reset();
                      setTimeout(function() {
                         window.location.href ="<?=base_url('andon/andonglobal?api='.time()); ?>"; 
                      }, 3000);
                     
                  
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

    function cancel(){
         window.location.href ="<?=base_url('andon/andonglobal?api='.time()); ?>"; 
    }
    </script>
</body>

</html>