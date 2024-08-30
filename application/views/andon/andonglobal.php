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
      font-size: 10px;      
    }
    @media (max-width: 899px) {
      .header{
        font-size: 22px;
      }
    }
    @media (min-width: 900px) and (max-width: 1500px) {
      .header{
        font-size: 24px;
      }
    }
     @media (min-width: 1500px) {
      .header{
        font-size: 26px;
      }
    }
     #modal-kotak{
        margin:auto;
        width: 100%; 
        position: fixed;
        z-index:1002;
        display: none;
        background: none; 
      }
      #atas1{
        padding: 5px;  
        height: 100%;
        position: relative;
        text-align: center;
        margin:auto;

      }
      #atas2{
        padding: 5px;  
        height: 100%;
        position: relative;
        text-align: center;
        margin:auto;

      }
      #bawah{
        background: #fff;
      }
       
      #tombol-tutup{  
        background: #ccc;
        border-radius: 5px;
      }
      #tombol-tutup,#tombol{
        height: 30px;
        width: 100px;
        color: #e74c3c;
        border: 0px;
        font-weight: 900;
      }
      #bg{
        opacity:.80;
        position: fixed;
        display: none;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: #000;
        z-index:1001;
        opacity: 0.8;
        color:black;

      }
       @keyframes invalid {
        from {
            background-color: #FF3B30;
            color: #fff;
        }

          to {
              background-color: #fff;
              color: red;
          }
      }
      .invalid {
        -webkit-animation: invalid 1s infinite;
        /* Safari 4+ */
        -moz-animation: invalid 1s infinite;
        /* Fx 5+ */
        -o-animation: invalid 1s infinite;
        /* Opera 12+ */
        animation: invalid 1s infinite;
        /* IE 10+ */
    }
     @keyframes invalidx {
        from {
            background-color: yellow;
            color: #000;
        }

          to {
              background-color: #fff;
              color: yellow;
          }
      }
      .invalidx {
        -webkit-animation: invalidx 1s infinite;
        /* Safari 4+ */
        -moz-animation: invalidx 1s infinite;
        /* Fx 5+ */
        -o-animation: invalidx 1s infinite;
        /* Opera 12+ */
        animation: invalidx 1s infinite;
        /* IE 10+ */
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
            touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
           -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
      }
      .btn-block {
        display: block;
        width: 100%;
        }
      .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
      }
      .btn-primary {
        color: #fff;
        background-color: #3c8dbc;
        border-color: #367fa9;
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
<div id="bg"></div>
<div id="modal-kotak">                
  <div id="atas1">                                        
  </div>
  <div id="atas2">                                        
  </div>                
</div>
<table style="height:100%;width:100%;border-spacing: 0px;">
  <tr>
    <td style="padding: 0px;height: 5%">
      
        <table style="height:100%;width:100%;border-spacing:0px;font-weight: bold;text-align: center;">
          <tr class="header">
            <td style="text-align: left;width: 20%">
              SHIFT : <span id="shift" style="color:lime">&nbsp;</span> 
            </td>
            <td style="color: lime;font-weight: bold;text-align: center;">
              SC PROCESS EFFICIENCY
            </td>
            <td style="text-align: right;width: 20%">
              <?=gmdate('d-m-Y',time()+60*60*7);?> <span id="clock"></span>
            </td>
          </tr>
        </table>
          
    </td>
  </tr>
  <tr>
    <td style="padding: 0px;">
      <table style="height:100%;width:100%;border-spacing:0px;font-weight: bold;text-align: center;margin-top:0px;">
        <?php $i=1; foreach ($data_line as $key) { 
            if($i % 3==1){ ?>
          <tr>
            <td style="width: 33.33%">
          <?php }else{ ?>
            <td style="width: 33.33%">
          <?php } ?>
                <table style="height:100%;width:100%;border-spacing: 0px;border-collapse: collapse;">
                  <tr style="font-size: 200%;">
                    <td colspan="5" style="border:2px solid white;height: 8%;" id="s<?=$key->line_no;?>">
                      <a href="<?=base_url('andon/effline/'.$key->line_no.'?id='.time());?>" target="_self" style="text-decoration: none;color: white;">
                        <?='LINE#'.$key->line_no.' '.$key->line_name;?>
                      </a>
                    </td>
                  </tr>
                  <tr style="font-size: 100%;background-color:#777">
                    <td style="border:2px solid white;height: 7%;width: 20%">PLAN</td>
                    <td style="border:2px solid white;width: 20%">SEAT</td>
                    <td style="border:2px solid white;width: 20%">RH</td>
                    <td style="border:2px solid white;width: 20%">LH</td>
                    <td style="border:2px solid white;width: 20%">EFF (%)</td>
                  </tr>
                  <tr style="font-size:215%;">
                    <td style="border:2px solid white;height: 16%" id="p<?=$key->line_no;?>">000</td>
                    <td style="border:2px solid white;background-color: green">OK</td>
                    <td style="border:2px solid white;color: lime" id="okrh<?=$key->line_no;?>">00</td>
                    <td style="border:2px solid white;color: lime" id="oklh<?=$key->line_no;?>">00</td>
                    <td style="border:2px solid white;color: lime" id="effok<?=$key->line_no;?>">00 %</td>
                  </tr>
                  <tr style="font-size: 100%;background-color:#777">
                    <td style="border:2px solid white;height: 7%;">ACTUAL</td>
                    <td style="border:2px solid white;width: 20%">SEAT</td>
                    <td style="border:2px solid white;width: 20%">RH</td>
                    <td style="border:2px solid white;width: 20%">LH</td>
                    <td style="border:2px solid white;width: 20%">EFF (%)</td>
                  </tr>
                  <tr style="font-size:215%;">
                    <td style="border:2px solid white;height: 16%" id="a<?=$key->line_no;?>">000</td>
                    <td style="border:2px solid white;background-color: red">NG</td>
                    <td style="border:2px solid white;color: red" id="ngrh<?=$key->line_no;?>">00</td>
                    <td style="border:2px solid white;color: red" id="nglh<?=$key->line_no;?>">00</td>
                    <td style="border:2px solid white;color: red" id="effng<?=$key->line_no;?>">00 %</td>
                  </tr>
                  <tr style="font-size: 100%;background-color:#777">
                    <td style="border:2px solid white;height: 7%;">TARGET</td>
                    <td colspan="4" style="border:2px solid white;">EFFICIENCY (%)</td>
                  </tr>
                  <tr>
                    <td style="border:2px solid white;height: 16%;font-size:215%;" id="t<?=$key->line_no;?>">000</td>
                    <td colspan="4" rowspan="3" style="border:2px solid white;font-size:600%;" id="e<?=$key->line_no;?>">00,00</td>
                  </tr>
                   <tr style="font-size: 100%;background-color:#777">
                    <td style="border:2px solid white;height: 7%;">TAKT TIME</td>
                  </tr>
                  <tr style="font-size:215%;">
                    <td style="border:2px solid white;height: 16%" id="tt<?=$key->line_no;?>"><?=$key->takt_time;?></td>
                  </tr>
                </table>
        <?php if($i % 3==0){ ?>
            </td>
          </tr>
          <?php }else{ ?>
            </td>
          <?php } ?>
      <?php $i=$i+1; } ?>
        
      </table>
    </td>
  </tr>
</table>
<script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js?id='.time());?>"></script>
<script type="text/javascript">
cv = '<?=$this->security->get_csrf_hash(); ?>';
$.ajaxSetup ({
    cache: false
});
$(document).ready(function() {
    doesConnectionExist();
       selesai();  
});
function selesai() {
  setTimeout(function() {
    doesConnectionExist();
    selesai();
  }, 10000);
}

function doesConnectionExist() {
    $.ajax({
        async: true,
        type: "POST",
        url :"<?=base_url("andon/resultglobal?=id".time());?>",
        cache:false,
        dataType: 'json',
        data: "<?=$this->security->get_csrf_token_name();?>="+cv,                 
        success: function(data){ 
              $("#atas2").html("");
              $('#shift').text(data.prod_shift);
              
              if(data.pa2!=false){
                open2(data.pa2,data.id2);
              }
              if(data.pa2==false){
                tutup();
              }
              <?php foreach ($data_line as $ke) {?>          
                var target<?=$ke->line_no;?> = data.target<?=$ke->line_no;?>;
                var eff<?=$ke->line_no;?> = data.eff<?=$ke->line_no;?>;
                var status<?=$ke->line_no;?> = data.status<?=$ke->line_no;?>;
                $('#p<?=$ke->line_no;?>').text(data.plan<?=$ke->line_no;?>);
                $('#a<?=$ke->line_no;?>').text(data.actual<?=$ke->line_no;?>);
                $('#t<?=$ke->line_no;?>').text(data.target<?=$ke->line_no;?>);
                $('#okrh<?=$ke->line_no;?>').text(data.okrh<?=$ke->line_no;?>);
                $('#ngrh<?=$ke->line_no;?>').text(data.ngrh<?=$ke->line_no;?>);
                $('#oklh<?=$ke->line_no;?>').text(data.oklh<?=$ke->line_no;?>);
                $('#nglh<?=$ke->line_no;?>').text(data.nglh<?=$ke->line_no;?>);
                $('#effok<?=$ke->line_no;?>').text(data.okpersen<?=$ke->line_no;?>+' %');
                $('#effng<?=$ke->line_no;?>').text(data.ngpersen<?=$ke->line_no;?>+' %');
                $('#tt<?=$ke->line_no;?>').text(data.takt_time<?=$ke->line_no;?>);
                $('#e<?=$ke->line_no;?>').text(data.eff<?=$ke->line_no;?>);
                
                  if(eff<?=$ke->line_no;?> >= <?=$ke->eff_max;?> && target<?=$ke->line_no;?> > 0){
                    $('#e<?=$ke->line_no;?>').css({"background-color": "green","color": "white"});
                  }else if(eff<?=$ke->line_no;?> >= <?=$ke->eff_min;?> && eff<?=$ke->line_no;?> < <?=$ke->eff_max;?> && target<?=$ke->line_no;?>>0){
                    $("#e<?=$ke->line_no;?>").css({"background-color": "yellow","color": "black"});
                  }else if(eff<?=$ke->line_no;?> < <?=$ke->eff_min;?> && target<?=$ke->line_no;?>>0){
                    $("#e<?=$ke->line_no;?>").css({"background-color": "red","color": "white"});
                  }else{
                    $("#e<?=$ke->line_no;?>").css({"background-color": "#000","color": "white"});
                   }
                  if(status<?=$ke->line_no;?>=="OFF"){
                    $("#s<?=$ke->line_no;?>").css({"background-color": "black"});
                  }else if(status<?=$ke->line_no;?>=="REST TIME"){
                    $("#s<?=$ke->line_no;?>").css({"background-color": "blue"});
                  }else if(status<?=$ke->line_no;?>=="RUNNING"){
                    $("#s<?=$ke->line_no;?>").css({"background-color": "green"});
                  }else if(status<?=$ke->line_no;?>=="DELAY"){
                    $("#s<?=$ke->line_no;?>").css({"background-color": "red"});
                  }else{
                    $("#s<?=$ke->line_no;?>").css({"background-color": "red"});
                  }
                  
            <?php } ?>
            
        }
    });
            
}
function viewdata(idstock){
  $.ajax({
          type: "POST",
          url : "<?=base_url('andon/form?api='.$this->id_t); ?>",
          data: "idstock="+idstock+"&qrrack=<?=$qr->qrrack;?>&<?=$this->security->get_csrf_token_name();?>="+cv,
          cache:false,
          success: function(data){
              $("#atas").html(data);
              $('#modal-kotak , #bg').fadeIn("slow");
          }
      });
}

function open2(data,id){
  if(data.substring(0,5)=='Delay'){
    $("#atas2").html("<table style='width:100%;height:100%;border-spacing:5px'><tr><td><h1 style='color:yellow;font-size:40px;padding:10px' class='invalidx'>SHOP A2<br>"+data+"</h1></td></tr></table>");
  }else{
    $("#atas2").html("<table style='width:100%;height:100%;border-spacing:5px'><tr><td><h1 style='color:red;font-size:40px;padding:10px' class='invalid'>SHOP A2<br>"+data+"<br><button class='btn btn-gray' onclick='confirm("+id+")'>Submit Confirmation</button</h1></td></tr></table>");
  }
   $('#modal-kotak , #bg').fadeIn("slow");
}
function tutup(){
        $('#moda-kotak , #bg').fadeOut("slow");
      }
function confirm(id){
         window.location.href ="<?=base_url('andon/confirmso?api='.time()); ?>&id="+id; 
    }
setTimeout(function () { 
  location.reload();
}, (7 * 60) * 1000);
</script>
</body>
</html>
