<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$qt->title;?> | Scan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.jpg'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?=base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/lte/dist/css/adminlte.min.css');?>">
    <link rel="stylesheet" href="<?=site_url('assets/lte/sweetalert/sweetalert.css');?>" />
    <style type="text/css">
    html,
    body {
        height: 100% !important;
        width: 100%;
        padding: 0px;
        margin: 0px;
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

    table,
    tr,
    td {
        padding: 1px;
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
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" +
            sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
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
            <table border="1"
                style="height:100%;width: 100%;border-spacing: 0px;border-collapse: collapse;border-color: #fff;">
                <tr>
                    <td style="width:50px;" class="bg-white">
                        <img src="<?=base_url('assets/img/logo.jpg');?>"
                            style="width:50px;height:35px;vertical-align: middle;">
                    </td>
                    <td style="height:5%;padding: 0px;font-size: 150%;vertical-align: middle;color:#fff"
                        class="text-bold;">
                        PULLING PART
                    </td>
                    <td onclick="logout()" style="width: 40px;" class="bg-white">
                        <img src="<?=base_url('assets/img/logout.png');?>"
                            style="width:40px;height:35px;vertical-align: middle;">
                    </td>
                </tr>
            </table>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="padding-top:0px !important;padding-bottom:0px !important;">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-8 text-left pl-0">
                            <?=$this->nama;?>,
                            <i><?=gmdate('Y-m-d',time()+60*60*7);?>&nbsp;<span id="clock"><?=date('H:i:s');?></span></i>
                        </div>
                        <div class="col-sm-4 pl-0">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#" onclick="back()">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('pulling?api='.$this->id_t);?>">Select
                                        PO</a></li>
                                <li class="breadcrumb-item"><a
                                        href="<?=base_url('pulling/scan?api='.$this->id_t.'&po_no='.$qe->po_no);?>">Scan</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content p-1" id="content">
                <!-- Default box -->

                <div class="card" style="height:100% !important">
                    <div class="card-header p-0 mb-0">
                        <table
                            style="height:100%;width: 100%; border-collapse: separate;border-spacing: 2px !important;border-color: #fff;">
                            <tr>
                                <td colspan="3" style="height:5%;padding:0px;vertical-align: top;">
                                    <?=form_open('pulling/submitscan?api='.$this->id_t, 'id="mydata" '); ?>
                                    <input type="hidden" name="po_no" value="<?=$qe->po_no;?>">
                                    <input type="hidden" name="customer" value="<?=$qe->customer;?>">
                                    <input type="hidden" name="csrf_sysx_name"
                                        value="<?=$this->security->get_csrf_hash(); ?>">
                                    <input id="qrcode" name="qrcode" type="text"
                                        class="form-control text-center text-sm" autocomplete="off"
                                        onfocus="this.value=''" required="required" minlength="1"
                                        style="padding: 1px !important;height: 20px;">
                                    <?=form_close();?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" id="scanstatus" class="text-bold"
                                    style="height:3%;background-color: #eee">
                                    <?=$scanstatus;?>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td style="height:1%;text-align: left">
                                    PO No
                                </td>
                                <td>
                                    Customer
                                </td>
                                <td>
                                    QtyTotal
                                </td>
                            </tr>
                            <tr style="font-size: 12px;color: green">
                                <td style="height:10%;width:50%;border-radius: 5px;border:1px solid #ccc;">
                                    <?=$qe->po_no;?>
                                </td>
                                <td style="border-radius: 5px;border:1px solid #ccc;">
                                    <?=$qe->customer;?>
                                </td>
                                <td style="border-radius: 5px;border:1px solid #ccc;">
                                    <?=$qe->pulling.'/'.$qe->po_qty;?>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td colspan="2" style="height:1%;text-align: left">
                                    QR Label->PartNoFsi <span class="badge badge-warning">Scan-1(x)</span>
                                </td>
                                <td>
                                    QtyScan
                                </td>
                            </tr>
                            <tr style="font-size: 12px;color: green">
                                <td colspan="2"
                                    style="height:10%;width:50%;border-radius: 5px;border:1px solid #ccc;text-align: left">
                                    <?=$t->qr_label.' '.$t->part_no_fsi;?>
                                </td>
                                <td style="border-radius: 5px;border:1px solid #ccc;">
                                    <?=$t->scan_qty.'/'.$t->po_qty;?>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td colspan="3" style="height:1%;text-align: left">
                                    Label Internal/No Box->PartNoFsi <span class="badge badge-warning">Scan-2(1x)</span>
                                </td>

                            </tr>
                            <tr style="font-size: 12px;color: green">
                                <td colspan="3"
                                    style="height:10%;border-radius: 5px;border:1px solid #ccc;text-align: left;">
                                    <?=$t->qr_label_fsi.' '.$t->part_no_fsi1;?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body p-1" style="overflow:scroll;">
                        <table
                            style="height:100%;width: 100%; border-collapse: separate;border-spacing: 2px !important;border-color: #fff;">
                            
                            <tr>
                                <td style="vertical-align:top" class="text-sm">

                                    <table border="1" id="mytable"
                                        style="width: 100%;text-align: left;border-spacing: 0px;border-collapse: collapse;border-color: #eee">
                                        <thead>

                                            <tr class="bg-info text-sm" style="height: 25px;">
                                                <th>PartNoCust</th>
                                                <th class="text-center">NoBox</th>
                                                <th>QRLabel</th>
                                                <th class="text-center">StoreLbl</th>
                                                <th>PartName</th>
                                                <th class="text-center">Scan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    $i=1;
                     foreach ($qm as $key) { if($t->part_no_customer==$key->part_no_customer){ 
                      ?>
                                            <tr class="link text-xs bg-white">
                                                <td><?=$key->part_no_customer;?></td>
                                                <td class="text-center"><?=$key->no_box;?></td>
                                                <td><?=$key->qr_label;?></td>
                                                <td class="text-center"><?=$key->storage_label;?></td>
                                                <td><?=$key->part_name;?></td>
                                                <td class="text-center"><?=$key->pulling.'/'.$key->po_qty;?></td>
                                            </tr>
                                            <?php 
                    $i=$i+1;
                     }
                      }
                    foreach ($qm as $key) { if($t->part_no_customer!=$key->part_no_customer){ 
                      ?>
                                            <tr
                                                class="link text-xs <?php if($key->po_qty==$key->pulling){ echo 'bg-success';}elseif($key->pulling>0 and $key->pulling<$key->po_qty){ echo 'bg-yellow';}else{ echo 'bg-black'; } ?> ">
                                                <td><?=$key->part_no_customer;?></td>
                                                <td class="text-center"><?=$key->no_box;?></td>
                                                <td><?=$key->qr_label;?></td>
                                                <td class="text-center"><?=$key->storage_label;?></td>
                                                <td><?=$key->part_name;?></td>
                                                <td class="text-center"><?=$key->pulling.'/'.$key->po_qty;?></td>
                                            </tr>
                                            <?php 
                    $i=$i+1;
                      }}
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
    <script src="<?=base_url('assets/lte/sweetalert/sweetalert.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var tinggi = ($(window).height() - 130);
        $('#content').css('height', tinggi);
        $("#loading").fadeOut("slow");
        $("#qrcode").focus();
        var mis = "<?=$mis;?>";
        if (mis != '') {
            window.location.href = "<?=base_url('pulling/mis?api='.$this->id_t); ?>";
        }
    });
    $(window).resize(function() {
        var tinggi = ($(window).height() - 130);
        $('#content').css('height', tinggi);
    })

    function loaded(b) {
        var audioCtx = new(window.AudioContext || window.webkitAudioContext)();
        var source = audioCtx.createBufferSource();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', b);
        xhr.responseType = 'arraybuffer';
        xhr.addEventListener('load', function(r) {
            audioCtx.decodeAudioData(
                xhr.response,
                function(buffer) {
                    source.buffer = buffer;
                    source.connect(audioCtx.destination);
                    source.loop = false;
                });
            playsound();
        });
        xhr.send();
        var playsound = function() {
            source.start(0);
        }
    }
    $('#mydata').submit(function(e) {
        e.preventDefault();
        var fa = $(this);
        $.ajax({
            url: fa.attr('action'),
            type: 'post',
            data: fa.serialize(),
            dataType: 'json',
            success: function(data) {
                $("#scanstatus").text(data.status);
                if (data.status == 'SUCCESS SCAN') {
                    $("#scanstatus").css({
                        "background-color": "green",
                        "color": "white"
                    });
                    var b = '<?=base_url('mp3/ok.mpeg?id='.time());?>';
                    loaded(b);
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else if (data.status == 'MIS PULLING') {
                    $("#scanstatus").css({
                        "background-color": "red",
                        "color": "white"
                    });
                    var b = '<?=base_url('mp3/error.mpeg?id='.time());?>';
                    loaded(b);
                    setTimeout(function() {
                        window.location.href =
                            "<?=base_url('pulling/mis?api='.$this->id_t); ?>";
                    }, 500);
                } else {
                    $("#scanstatus").css({
                        "background-color": "red",
                        "color": "white"
                    });
                    var b = '<?=base_url('mp3/error.mpeg?id='.time());?>';
                    loaded(b);
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
                $("#qrcode").focus();

            }
        });

    });

    function back() {
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
            function() {
                window.location.href = "<?=base_url('pulling/back?api='.$this->id_t); ?>";
            });
    }

    function logout() {
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
            function() {
                window.location.href = "<?=base_url('pulling/logout?api='.$this->id_t); ?>";
            });
    }
    </script>

</body>

</html>