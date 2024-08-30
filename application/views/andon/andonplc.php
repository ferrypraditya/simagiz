<!DOCTYPE html>
<html>
    <head>
        <title>ANDON PLC</title>
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
                     <th rowspan="2" style="height:1%; background-color:black; color:white; textAlign:center; font-size:60px;"><?=$title;?></th>
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
          <tr>
            <td style="height:1%; background-color:blue; color:white; textAlign:center; font-size:30px;">
            <?=$plc;?>
            </td>
            <td style="height:1%; background-color:orange; color:black; textAlign:center; font-size:30px;">
            <?=$printer;?>
            </td>
          </tr>
          <tr>
            <td id="viewplc" style="width:50%; vertical-align:top;">
                    DATA
            </td>
            <td id="viewprinter" style="vertical-align:top;" >
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
        url :"<?=base_url("andon/viewplc?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
        cache:false,
        data: "id="+id,                 
        success: function(data){ 
            $("#viewplc").html(data);
                                  
            
        }
    });
    $.ajax({
        async: true,
        type: "POST",
        url :"<?=base_url("andon/viewprinter?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
        cache:false,
        data: "id="+id,                 
        success: function(data){ 
            $("#viewprinter").html(data);
                                  
            
        }
    });
}
$.ajaxSetup ({
    cache: false
});
$(document).ready(function() {
   selesai();
   viewtabel();
     
});
function selesai() {
  setTimeout(function() {
    viewtabel();
    selesai();   
  }, 10000);
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