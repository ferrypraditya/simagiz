<!DOCTYPE html>
<html>
    <head>
        <title>ANDON LIFTING</title>
        <style type="text/css">
            html,body {
                height:100%;
                width:100%;
                margin:0px;
                padding:0px;
                text-align:center;
                font-size: 12px;
                font-family:Arial;
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
    <table border="1" style="width:100%;height:100%;text-align:center;border-spacing:0px;border-collapse:collapse;">
        
         <tr>
            <td colspan="2" style="height:5%">
            
                <table border="1" style="width:100%;height:100%;text-align:center;border-spacing:0px;border-collapse:collapse;">
                 <tr>
                    <th rowspan="3" style="width:130px; padding:1px; cursor:pointer;" onclick="refresh()">
                        <img src="<?=base_url('assets/img/logo.jpg');?>" style="width:100px;height:60px;vertical-align: middle;">
                    </th>
                     <th rowspan="2" style="height:1%; width:75%; background-color:black; color:white; textAlign:center; font-size:40px;"><?=$title;?></th>
                     <th style="textAlign:center; font-size:20px;"><?=strtoupper(gmdate('d-M-Y',time()+60*60*7));?></th>  
                </tr>
                <tr style="width:10%">
                    <th style="textAlign:center; font-size:20px;">   
                    <span id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span> <?=strtoupper($this->shift);?>
                    </th>
                </tr>
              </table>
            </td>
        </tr>
          <tr>
            <td id="viewlifting" style="width:50%; vertical-align:top;">
                    DATA
            </td>
        </tr>
    </table>

<script src="<?=site_url('assets/lte/jquery/jquery-2.2.3.min.js')?>"></script>
<script type="text/javascript">
function viewtabel(){
    var id="";
    $.ajax({
        async: true,
        type: "POST",
        url :"<?=base_url("andon/viewlifting?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
        cache:false,
        data: "id="+id,                 
        success: function(data){ 
            $("#viewlifting").html(data);
                                  
            
        }
    });
}
$.ajaxSetup ({
    cache: false
});
$(document).ready(function() {
    doesConnectionExist();
       selesai();
       viewtabel();
     
});
function selesai() {
  setTimeout(function() {
    doesConnectionExist();
    viewtabel();
    selesai();   
  }, 10000);
}

function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
    var file = "#";
    var randomNum = Math.round(Math.random() * 10000);
    var id = " ";
    xhr.open('HEAD', file + "?nocache=" + randomNum, true);
    xhr.send();
    
    xhr.addEventListener("readystatechange", processRequest, false);

    function processRequest(e) {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 304) {
          $(document).ready(function(){
            
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