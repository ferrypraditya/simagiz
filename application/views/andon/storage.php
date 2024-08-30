<!DOCTYPE html>
<html>
<head>
<style type="text/css">
   html,body { 
      height: 100%;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: arial;
      background-color: black;
      color: white;
      font-size: 14px;      
    }
    @media (max-width: 899px) {
      .header{
        font-size: 12px;
      }
    }
    @media (min-width: 900px) and (max-width: 1500px) {
      .header{
        font-size: 20px;
      }
    }
     @media (min-width: 1500px) {
      .header{
        font-size: 24px;
      }
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
<table style="height:100%;width:100%;border-spacing: 0px;font-weight: bold;">
  <tr>
    <td style="padding:1px;">
      <table style="height:100%;width:100%;border-spacing: 0px;text-align: center;border:0px solid #fff">
          <tr class="header" style="background-color: #000">
            <td rowspan="2" style="width:9%;border:2px solid #fff;background-color: #444;padding: 1px;background:url('<?=$logo;?>');background-repeat: no-repeat;background-size:100% 100%;">
             &nbsp;
            </td>
            <td style="height:7%;border:2px solid #fff;font-size: 200%;font-weight: bold;text-shadow:2px 2px 3px #000;">
              ANDON STORAGE FINISH GOOD
            </td>
            <td rowspan="2" style="width:16%;border:2px solid #fff;font-size:150%">
              <?=strtoupper(gmdate('d-m-Y',time()+60*60*7));?><br>
              <span id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span>
            </td>
          </tr>
          <tr class="header" style="background-color: #000">
            <td style="height:4%;border:2px solid #fff">
            PT. FUJI SEAT INDONESIA - KIIC PLANT
            </td>
          </tr>
          <tr>
            <td colspan="3" class="content" id="update" >
              <table style="height:100%;width:100%;border-spacing: 0px;border-collapse: collapse;" class="header">
                <tr style="font-size: 120%;background-color:blue">
                  <td colspan="<?=$jumlah_zona;?>" style="border:2px solid white;height:2%;">STORAGE</td>
                </tr>
                <tr style="font-size: 150%;background-color:#777">
                  <td colspan="<?=ceil($jumlah_zona/2);?>" style="border:2px solid white;height: 7%">REAR 1 RH/LH</td>
                  <td colspan="<?=$jumlah_zona-ceil($jumlah_zona/2);?>" style="border:2px solid white;">FRONT RH/LH + REAR 2</td>        
                </tr>
                <tr style="font-size: 150%;background-color:#777">
                  <?php foreach ($data_st as $key) { ?>
                  <td style="border:2px solid white;height: 7%;width:<?=100/$jumlah_zona;?>%"><?=$key->zona;?></td>
                  <?php } ?>

                </tr>
                <tr style="font-size: 150%;">
                  <?php foreach ($data_st as $key) { ?>
                  <td style="border:2px solid white;"><?=$key->grade;?></td>
                  <?php } ?>
                </tr>
                <tr style="font-size: 230%;">
                  <?php 
                  $jumlahset1=0;
                  $jumlahset2=0;
                  foreach ($data_st as $key) { 
                    if($key->set_no==1){
                      $jumlahset1=$jumlahset1+$key->stock;
                    }else{
                      $jumlahset2=$jumlahset2+$key->stock;
                    } ?>
                  <td style="border:2px solid white;"><?=$key->stock;?></td>
                  <?php } ?>
                </tr>
                <tr style="font-size: 210%;background-color: green">
                  <td colspan="<?=ceil($jumlah_zona/2);?>" style="border:2px solid white;"><?=$jumlahset2;?></td>
                  <td colspan="<?=$jumlah_zona-ceil($jumlah_zona/2);?>" style="border:2px solid white;"><?=$jumlahset1;?></td>        
                </tr>
                <tr>
                  <td colspan="<?=$jumlah_zona;?>" style="padding: 0px;">
                    <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse:collapse;">
                        <tr style="font-size: 120%;background-color:blue">
                          <td colspan="11" style="border:2px solid white;height:7%;">RM</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td colspan="2" style="width:25%;height: 4%;border:2px solid white;">D79L</td>
                          <td colspan="2" style="width:25%;border:2px solid white;">D26A</td>
                          <td colspan="4" style="border:2px solid white;">D26A</td>
                          <td colspan="3" style="border:2px solid white;">D79L</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td colspan="2" style="border:2px solid white;height: 4%;">RR1</td>
                          <td colspan="2" style="border:2px solid white;">RR1</td>
                          <td colspan="2" style="border:2px solid white;">FR</td>
                          <td colspan="2" style="border:2px solid white;">RR2</td>
                          <td colspan="2" style="border:2px solid white;">FR</td>
                          <td  style="border:2px solid white;">RR2</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td style="border:2px solid white;height: 4%;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">R/L</td>
                        </tr>
                        
                       <tr style="font-size: 230%;">
                          <?php 
                            $D79L2LH=0;
                            $D79L2RH=0;
                            $D26A2LH=0;
                            $D26A2RH=0;
                            $D79L1LH=0;
                            $D79L1RH=0;
                            $D79L1RL=0;
                            $D26AFRONTLH=0;
                            $D26AFRONTRH=0;
                            $D26ARR2LH=0;
                            $D26ARR2RH=0;
                            foreach($data_rm as $val){
                              if($val->grade.$val->set_no.$val->side_label=='D79L2LH'){
                               $D79L2LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L2RH'){
                               $D79L2RH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D26A2LH'){
                               $D26A2LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D26A2RH'){
                               $D26A2RH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L1LH'){
                               $D79L1LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L1RH'){
                               $D79L1RH=$val->stock;
                              }
                              if($val->grade.$val->row_seat=='D79LREAR NO. 2'){
                               $D79L1RL=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AFRONTLH'){
                               $D26AFRONTLH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AFRONTRH'){
                               $D26AFRONTRH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AREAR NO. 2LH'){
                               $D26ARR2LH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AREAR NO. 2RH'){
                               $D26ARR2RH=$val->stock;
                              }
                            }
                            $RM2=$D79L2LH+$D79L2RH+$D26A2LH+$D26A2RH;
                            $RM1=$D79L1LH+$D79L1RH+$D79L1RL+$D26AFRONTLH+$D26AFRONTRH;
                            ?>
                          <td style="border:2px solid white;"><?=$D79L2LH;?></td>
                          <td style="border:2px solid white;"><?=$D79L2RH;?></td>
                          <td style="border:2px solid white;"><?=$D26A2LH;?></td>
                          <td style="border:2px solid white;"><?=$D26A2RH;?></td>
                          <td style="border:2px solid white;"><?=$D26AFRONTLH;?></td>
                          <td style="border:2px solid white;"><?=$D26AFRONTRH;?></td>
                          <td style="border:2px solid white;"><?=$D26ARR2LH;?></td>
                          <td style="border:2px solid white;"><?=$D26ARR2RH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1LH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1RH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1RL;?></td>
                        </tr>
                        <tr style="font-size: 210%;background-color: green">
                          <td colspan="4" style="border:2px solid white;"><?=$RM2;?></td>
                          <td colspan="7" style="border:2px solid white;"><?=$RM1;?></td>        
                        </tr>
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
    <td style="height:6%;">
      <marquee style="font-size: 20px;vertical-align: middle;color:yellow"><i><?=$pesan_andon;?></i></marquee>
    </td>
  </tr>
</table>
<script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js?='.$this->encrypt->sha1(rand(1000,10000000)));?>"></script>
<script type="text/javascript">
$.ajaxSetup ({
    cache: false
});
cv='<?=$this->security->get_csrf_hash(); ?>';

$(document).ready(function() {
    doesConnectionExist();
       selesai();
     
});
function selesai() {
  setTimeout(function() {
    doesConnectionExist();
    selesai();
  }, 2000);
}

function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
    var file = "#";
    var randomNum = Math.round(Math.random() * 10000);
    var jumlah = "<?=$jumlah;?>";

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
                    url :"<?=base_url("andon/result_storage?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
                    cache:false,
                    dataType: 'json',
                    data: "jumlah="+jumlah+"&<?=$this->security->get_csrf_token_name();?>="+cv,                 
                    success: function(data){                       
                       if(data.jumlah>jumlah){
                          $('#update').load('<?=base_url('andon/view_storage'); ?>', 'f' + (Math.random()*1000000));
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
}, (5 * 60) * 1000);
</script>
</body>
</html>
