<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  html,body { 
      height: 100%;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: sans-serif;
      background-color: #000;
      color: yellow;
      
    }
    @media (max-width: 899px) {
      .header{
        font-size: 7px;
      }
      .content{
        font-size: 8px;
      }
    }
    @media (min-width: 900px) {
      .header{
        font-size: 16px;
      }
      .content{
        font-size: 16px;
      }
    }
    .text-center{
      text-align: center;
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
      <table style="height:100%;width:100%;border-spacing: 0px;text-align: center;border:1px solid #fff">
          <tr class="header" style="background-color: #000">
            <td rowspan="2" style="width:9%;border:1px solid #fff;background-color: #444;padding: 1px;background:url('<?=$logo;?>');background-repeat: no-repeat;background-size:100% 100%;">
             &nbsp;
            </td>
            <td style="height:7%;border:1px solid #fff;font-size: 220%;font-weight: bold;text-shadow:2px 2px 3px #000;">
              ANDON STOCK SEAT
            </td>
            <td rowspan="2" style="width:16%;border:1px solid #fff;font-size:150%">
              <?=strtoupper(gmdate('d-m-Y',time()+60*60*7));?><br>
              <span id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span>
            </td>
          </tr>
          <tr class="header" style="background-color: #000">
            <td style="height:4%;border:1px solid #fff;font-size: 110%;">
            PT. FUJI SEAT INDONESIA - KIIC PLANT
            </td>
          </tr>
          <tr>
            <td colspan="3" class="content" id="update" style="border:1px solid #fff">
              <table style="height:100%;width:100%;border-spacing: 7px;text-align: center;color: #fff">
                <tr>
                  <td style="width: 50%">
                    <table style="height:100%;width:100%;border-spacing: 0px;text-align: center;color: #fff">
                      <tr style="background-color: blue;">
                        <td colspan="8" style="height:7%;border: 1px solid #fff;font-size: 150%;">
                          FRONT RH/LH
                        </td>
                      </tr>
                      <tr style="background-color: blue;">
                        <td style="height:7%;border: 1px solid #fff">
                          PART NO
                        </td>
                        <td style="border: 1px solid #fff">
                          SIDE
                        </td>
                        <td style="border: 1px solid #fff">
                          GRADE
                        </td>
                        <td style="border: 1px solid #fff">
                          MODEL
                        </td>
                        <td style="border: 1px solid #fff">
                          SUFFIX
                        </td>
                        <td style="border: 1px solid #fff">
                          STORAGE
                        </td>
                        <td style="border: 1px solid #fff">
                          DOKATEI
                        </td>
                        <td style="border: 1px solid #fff">
                          COKOTE
                        </td>
                      </tr>
                      <?php foreach ($data_stock as $key) {
                        if($key->stock==0){ $bg="background-color:red;";}elseif ($key->stock>0) {$bg="background-color:green;";}
                        if($key->storage==0){ $bg1="background-color:red;";}elseif ($key->storage>0) {$bg1="background-color:green;";}
                        if($key->dokatei==0){ $bg2="background-color:red;";}elseif ($key->dokatei>0) {$bg2="background-color:green;";}
                        if($key->row_seat=='FRONT'){ ?>
                      <tr>
                        <td style="border: 1px solid #fff">
                          <?=$key->part_no;?>
                        </td>
                        <td style="border: 1px solid #fff">
                         <?=$key->side_label;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$grade;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->model;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->suffix1;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg1;?>">
                          <?=$key->storage;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg2;?>">
                          <?=$key->dokatei;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg;?>">
                          <?=$key->stock;?>
                        </td>
                      </tr>
                    <?php } } ?>
                    </table>

                  </td>
                  <td>
                      <table style="height:100%;width:100%;border-spacing: 0px;text-align: center;color: #fff">
                      <tr style="background-color: blue;">
                        <td colspan="8" style="height:7%;border: 1px solid #fff;font-size: 150%;">
                          REAR NO. 1 RH/LH
                        </td>
                      </tr>
                      <tr style="background-color: blue;">
                        <td style="height:7%;border: 1px solid #fff">
                          PART NO
                        </td>
                        <td style="border: 1px solid #fff">
                          SIDE
                        </td>
                        <td style="border: 1px solid #fff">
                          GRADE
                        </td>
                        <td style="border: 1px solid #fff">
                          MODEL
                        </td>
                        <td style="border: 1px solid #fff">
                          SUFFIX
                        </td>
                        <td style="border: 1px solid #fff">
                          STORAGE
                        </td>
                        <td style="border: 1px solid #fff">
                          DOKATEI
                        </td>
                        <td style="border: 1px solid #fff">
                          COKOTE
                        </td>
                      </tr>
                      <?php foreach ($data_stock as $key) { 
                        if($key->stock==0){ $bg="background-color:red;";}elseif ($key->stock>0) {$bg="background-color:green;";}   
                        if($key->storage==0){ $bg1="background-color:red;";}elseif ($key->storage>0) {$bg1="background-color:green;";}
                        if($key->dokatei==0){ $bg2="background-color:red;";}elseif ($key->dokatei>0) {$bg2="background-color:green;";}                     
                        if($key->row_seat=='REAR NO. 1'){ ?>
                      <tr>
                        <td style="border: 1px solid #fff">
                          <?=$key->part_no;?>
                        </td>
                        <td style="border: 1px solid #fff">
                         <?=$key->side_label;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$grade;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->model;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->suffix1;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg1;?>">
                          <?=$key->storage;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg2;?>">
                          <?=$key->dokatei;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg;?>">
                          <?=$key->stock;?>
                        </td>
                      </tr>
                    <?php } } ?>
                      <tr style="background-color: blue;">
                        <td colspan="8" style="height:7%;border: 1px solid #fff;font-size: 150%">
                          REAR NO. 2
                        </td>
                      </tr>
                      <?php foreach ($data_stock as $key) {
                        if($key->stock==0){ $bg="background-color:red;";}elseif ($key->stock>0) {$bg="background-color:green;";}
                        if($key->storage==0){ $bg1="background-color:red;";}elseif ($key->storage>0) {$bg1="background-color:green;";}
                        if($key->dokatei==0){ $bg2="background-color:red;";}elseif ($key->dokatei>0) {$bg2="background-color:green;";}
                        if($key->row_seat=='REAR NO. 2'){ ?>
                      <tr>
                        <td style="border: 1px solid #fff">
                          <?=$key->part_no;?>
                        </td>
                        <td style="border: 1px solid #fff">
                         <?=$key->side_label;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$grade;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->model;?>
                        </td>
                        <td style="border: 1px solid #fff">
                          <?=$key->suffix1;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg1;?>">
                          <?=$key->storage;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg2;?>">
                          <?=$key->dokatei;?>
                        </td>
                        <td style="border: 1px solid #fff;<?=$bg;?>">
                          <?=$key->stock;?>
                        </td>
                      </tr>
                    <?php } } ?>
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
                    url :"<?=base_url("andon/result_cokote?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
                    cache:false,
                    dataType: 'json',
                    data: "jumlah="+jumlah+"&<?=$this->security->get_csrf_token_name();?>="+cv,                    
                    success: function(data){                       
                       if(data.jumlah>jumlah){
                          location.reload();
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
</script>

<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, (5 * 60) * 1000);
</script>
</body>
</html>
