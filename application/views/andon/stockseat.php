<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Andon Stock</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/lte/jquery/dataTables.jqueryui.min.css');?>">
  <link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg');?>" type="image/x-icon" />
  <style type="text/css">
   html,body { 
      height: 100%;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: sans-serif;
      background-color: #000;
      color: #fff;
      font-weight: bold;
      
    }
    @media (max-width: 899px) {
      .header{
        font-size: 12px;
      }
      .content{
        font-size: 10px;
      }
    }
    @media (min-width: 900px) {
      .header{
        font-size: 28px;
      }
      .content{
        font-size: 20px;
      }
    }
     table,tr,td{
      padding: 0px;

    }
    div.dataTables_wrapper {
      margin-top: 2px;
      font-size: 85%;
    }
    div.dataTables_length {
      color: #ccc !important;
      font-size: 12px !important;
    }
    div.dataTables_filter {
      color: #ccc !important;
      font-size: 12px !important;
      margin-bottom: 2px;
    }
    div.dataTables_info {
      color: #ccc !important;
      font-size: 12px !important
    }
    div.dataTables_paginate {
      color: #ccc !important;
      font-size: 12px !important;
      padding: 0px
    }
    div.dataTables_scrollBody
      {
       overflow-x:hidden !important;
       overflow-y:auto !important;
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
        $("#clock").text((sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss));
    }
    setInterval('displayServerTime()',500);
</script>
</head>
<body>
<table style="height:100%;width:100%;border-spacing: 0px;">
  <tr>
    <td>
      <table border="1" style="height:100%;width:100%;border-spacing: 1px;text-align: center;border-color: white">
          <tr class="header">
            <td style="width:130px;padding: 1px;cursor: pointer;" onclick="refresh()">
              <img src="<?=base_url('assets/img/logo.jpg');?>" style="width:130px;height:90px;vertical-align: middle;">
            </td>
            <td style="height:5%;font-size: 250%;">
              ANDON STOCK SEAT
            </td>
            <td style="width:20%;font-size:110%;">
              <table style="width: 100%;height: 100%;text-align: center;border-spacing: 0px;">
              <tr>
                  <td style="vertical-align: bottom;"><?=strtoupper(gmdate('d-M-Y',time()+60*60*7));?></td>
                </tr>
                <tr>
                  <td>
                    <span id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span> <?=strtoupper($this->shift);?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="3" class="content">
                <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                  <tr>
                    <td>
                      <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                          <tr>
                            <td onclick="selectstock('EMPTY');" style="background-color: red;width: 20%;cursor: pointer;">
                              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                                <tr>
                                  <td style="height: 30px;border:2px solid #fff">
                                    EMPTY
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 500%;border:2px solid #fff">
                                    <?=$data_st->empty;?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td onclick="selectstock('CRITICAL');" style="background-color: yellow;color:black;cursor: pointer;">
                              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                                <tr>
                                  <td style="height: 30px;border:2px solid #fff">
                                    CRITICAL
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 500%;border:2px solid #fff">
                                    <?=$data_st->critical;?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td onclick="selectstock('NORMAL');" style="background-color: green;width: 20%;cursor: pointer;">
                              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                                <tr>
                                  <td style="height: 30px;border:2px solid #fff">
                                    NORMAL
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 500%;border:2px solid #fff">
                                    <?=$data_st->normal;?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td onclick="selectstock('OVER');" style="background-color: blue;width: 20%;cursor: pointer;">
                              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                                <tr>
                                  <td style="height: 30px;border:2px solid #fff">
                                    OVER
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 500%;border:2px solid #fff">
                                    <?=$data_st->over;?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td onclick="selectstock('T/APROD');" style="background-color: gray;width: 20%;cursor: pointer;">
                              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse:collapse;">
                                <tr>
                                  <td style="height: 30px;border:2px solid #fff">
                                    T/A PROD
                                  </td>
                                </tr>
                                <tr>
                                  <td style="font-size: 500%;border:2px solid #fff">
                                    <?=$data_st->taprod;?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td id="update" style="vertical-align: top;height: 65% !important">
                      <table id="example" class="display compact" style="width:100%;height:100%;border-spacing: 0px;border-collapse:collapse;">
                        <thead>
                            <tr style="background-color: #444;">
                              <th style="border:1px solid #ccc;height: 25px">
                                IDSEAT
                              </th>
                              <th style="border:1px solid #ccc;">
                                CODE
                              </th>
                              <th style="border:1px solid #ccc;">
                                ITEM
                              </th>
                              <th style="border:1px solid #ccc;">
                                PARTNO
                              </th>
                              <th style="border:1px solid #ccc;">
                                GRADE
                              </th>
                              <th style="border:1px solid #ccc;">
                                MODEL
                              </th>
                              <th style="border:1px solid #ccc;">
                                MIN
                              </th>
                              <th style="border:1px solid #ccc;">
                                MAX
                              </th>
                              
                              <th style="border:1px solid #ccc;">
                                STOCK
                              </th>
                              <th style="border:1px solid #ccc;">
                                P/H
                              </th>
                              <th style="border:1px solid #ccc;">
                                STRENGTH
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($data_seat as $key) { 
                              if($key->status=='EMPTY'){
                                $bg="background-color:red";
                              }elseif($key->status=='CRITICAL'){
                                 $bg="background-color:yellow;color:black;";
                              }elseif($key->status=='NORMAL'){
                                 $bg="background-color:green;";
                              }elseif($key->status=='OVER'){
                                 $bg="background-color:blue;";
                              }else{
                                  $bg="background-color:gray;";
                              }
                             ?>
                            <tr style="<?=$bg;?>">
                              <td style="border:1px solid #ccc;">
                                <?=$key->idseat;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->code;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->item;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->part_no;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->grade;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->model;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->stock_min;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->stock_max;?>
                              </td>
                              
                              <td style="border:1px solid #ccc;">
                                <?=$key->stock;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=$key->prod_h;?>
                              </td>
                              <td style="border:1px solid #ccc;">
                                <?=round($key->stock/$key->prod_h,2);?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </table>
            </td>                
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td style="height:6%;background-color: #000;color:yellow">
      <marquee style="font-size: 20px;vertical-align: middle;"><i><?=$pesan_andon;?></i></marquee>
    </td>
  </tr>
</table>
<script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?=base_url('assets/lte/jquery/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
function loaded(b){
    var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    var source = audioCtx.createBufferSource();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', b);
    xhr.responseType = 'arraybuffer';
    xhr.addEventListener('load', function (r) {
    audioCtx.decodeAudioData(
      xhr.response,
      function (buffer) {
      source.buffer = buffer;
      source.connect(audioCtx.destination);
      source.loop = false;
      });
    playsound();
    });
    xhr.send();
    var playsound = function () {
      source.start(0);
      };
    }
var tinggi = ($(window).height()-340);
  if(tinggi<150){
    var tinggi=150;
  }
var page = 10;
if(tinggi>400){
  var page = 12;
}
$('#example').DataTable({
    "ordering": false,
    "pageLength" :page,
    "lengthMenu":[ [10,15,20, 25, 50, -1], [10,15,20, 25, 50, "All"] ],
    "scrollCollapse":true,
    "paging":true,
    "fixedColumns":false,
    "autoWidth": true,
    "lengthChange": true,
    "order": [[10,'asc']],
  });



$.ajaxSetup ({
    cache: false
});
$(document).ready(function() {
    $("input").focus();
    doesConnectionExist();
       selesai();
     
});
function selesai() {
  setTimeout(function() {
    doesConnectionExist();
    selesai();
    
  }, 10000);
}

function selectstock(status){
  $.ajax({
      type: "POST",
      url : "<?=base_url('andon/selectstock?='.$this->encrypt->sha1(rand(1000,10000000))); ?>",
      data: "status="+status,  
      cache:false,
      success: function(data){          
        $("#update").html(data);
      }
  });
}
function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
    var file = "#";
    var randomNum = Math.round(Math.random() * 10000);
    var tstock = "<?=$data_st->tstock;?>";
    var b = '<?=base_url('mp3/stock_empty');?>.mp3';
    var stock="<?=$data_st->empty;?>";
    xhr.open('HEAD', file + "?nocache=" + randomNum, true);
    xhr.send();
    
    xhr.addEventListener("readystatechange", processRequest, false);

    function processRequest(e) {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 304) {
          $(document).ready(function(){
                $.ajax({
                    async: true,
                    type: "POST",
                    url :"<?=base_url("andon/resultstock?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
                    cache:false,
                    dataType: 'json',
                    data: "tstock="+tstock,                 
                    success: function(data){                       
                       if(data.tstock!=tstock){
                          location.reload();
                       }                       
                       if(stock>0){
                         loaded(b);
                      }
                      
                    }
                });
            
           });
        } else {
            tempAlert("KONEKSI ERROR <br><br><br>Silakan Periksa Koneksi Jaringan / Network Anda !!",4000);
        }
      }
    }
}

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:15%;left:25%;background-color:yellow");
 el.innerHTML = msg;
 el.style.width = "670px";
el.style.height = "530px";
el.style.textAlign = "center";
el.style.fontSize = "50px";
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
setTimeout(function () { 
  location.reload();
}, (3 * 60) * 1000);
 function refresh(){
      location.reload();
  }
</script>
</body>
</html>