<?php
foreach ($data_seat as $key) {
  if($key->row_seat=='FRONT' and $key->side_label=='LH'){
    if($key->status=='OK' and $key->finishqc_time!=''){
      $bg_L='background-color:green;color:#fff;';
    }elseif($key->status=='NG' and $key->finishqc_time!=''){
      $bg_L='background-color:red;color:#fff;';
    }else{
      $bg_L='background-color:yellow;color:#000;';
    }
    $lifting_no_L=$key->lifting_no;
    $suffix1_L=$key->suffix1;
    $model_L=$key->model;
    $part_no_L=$key->part_no;
  }elseif($key->row_seat=='FRONT' and $key->side_label=='RH'){
    if($key->status=='OK' and $key->finishqc_time!=''){
      $bg_R='background-color:green;color:#fff;';
    }elseif($key->status=='NG' and $key->finishqc_time!=''){
      $bg_R='background-color:red;color:#fff;';
    }else{
      $bg_R='background-color:yellow;color:#000;';
    }
    $lifting_no_R=$key->lifting_no;
    $suffix1_R=$key->suffix1;
    $model_R=$key->model;
    $part_no_R=$key->part_no;
  }elseif($key->row_seat=='REAR NO. 2' and $key->side_label=='LH'){
    if($key->status=='OK' and $key->finishqc_time!=''){
      $bg_L2='background-color:green;color:#fff;';
    }elseif($key->status=='NG' and $key->finishqc_time!=''){
      $bg_L2='background-color:red;color:#fff;';
    }else{
      $bg_L2='background-color:yellow;color:#000;';
    }
    $lifting_no_L2=$key->lifting_no;
    $suffix1_L2=$key->suffix1;
    $model_L2=$key->model;
    $part_no_L2=$key->part_no;
  }elseif($key->row_seat=='REAR NO. 2' and $key->side_label=='RH'){
    if($key->status=='OK' and $key->finishqc_time!=''){
      $bg_R2='background-color:green;color:#fff;';
    }elseif($key->status=='NG' and $key->finishqc_time!=''){
      $bg_R2='background-color:red;color:#fff;';
    }else{
      $bg_R2='background-color:yellow;color:#000;';
    }
    $lifting_no_R2=$key->lifting_no;
    $suffix1_R2=$key->suffix1;
    $model_R2=$key->model;
    $part_no_R2=$key->part_no;
  }else{
    if($key->status=='OK' and $key->finishqc_time!=''){
      $bg_B='background-color:green;color:#fff;';
    }elseif($key->status=='NG' and $key->finishqc_time!=''){
      $bg_B='background-color:red;color:#fff;';
    }else{
      $bg_B='background-color:yellow;color:#000;';
    }
    $lifting_no_B=$key->lifting_no;
    $suffix1_B=$key->suffix1;
    $model_B=$key->model;
    $part_no_B=$key->part_no;
  }
}
?>
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
      background-color: black;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
    }
</style>
</head>
<body>
  <table style="height:100%;width:100%;border-spacing: 0px;">
  <tr>
    <td style="padding:5px;">
      <table style="height:100%;width:100%;border-spacing: 1px;">
          <tr>
            <td colspan="3" style="height:5%;font-size: 30px;">PACKING SEAT INFORMATION (FRONT & REAR 2)</td>
          </tr>
          <tr>
            <td colspan="3" style="height:5px"></td>
          </tr>
          <tr>
            <?php if($jset==3){ ?>
            <td colspan="2" style="border:2px solid #fff;font-size: 200%;">

              <table  id="bench" style="height:100%;width:100%;text-align:center;border-spacing: 0px;border:1px solid #000;text-align:center;<?=$bg_B;?>">
                  <tr>
                    <td rowspan="2" style="width:70%;border-right:1px solid #000;font-size: 120%;">
                      <label style="font-size: 150%;font-weight: bold;"><?=$lifting_no_B;?></label><br>
                      <label style="font-size: 100%;"><?=$model_B;?></label><br>
                      <label style="font-size: 100%;font-weight: bold;"><?=$part_no_B;?></label>
                    </td>
                    <td style="width:5%;height: 30%;vertical-align: top;border-bottom:1px solid #000;">
                      <label style="border-radius: 30px;background-color: black;color: white">&nbsp;3&nbsp;</label>
                    </td>
                    <td style="border-bottom:1px solid #000;height: 50%;font-size: 120%;">BENCH</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="word-break: break-all;">
                      <?=$suffix1_B;?>
                    </td>
                  </tr>
                </table>
            </td>
          <?php }else{ ?>
            <td style="width:35%;border:2px solid #fff;font-size: 200%;">
              <table id="lh2" style="height:100%;width:100%;text-align:center;border-spacing: 0px;border:1px solid #000;<?=$bg_L2;?>">
                  <tr>
                    <td style="width:5%;height: 30%;vertical-align: top">
                      <label style="border-radius: 30px;background-color: black;color: white">&nbsp;4&nbsp;</label>
                    </td>
                    <td style="width:25%;border-right:1px solid #000;height: 30%;font-size: 120%;">RR2 LH</td>
                    <td style="font-size: 100%;word-break: break-all;"><?=$suffix1_L2;?></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="border-top:1px solid #000;">
                      <label style="font-size: 150%;font-weight: bold;"><?=$lifting_no_L2;?></label><br>
                      <label style="font-size: 100%;"><?=$model_L2;?></label><br>
                      <label style="font-size: 100%;font-weight: bold;"><?=$part_no_L2;?></label>
                    </td>
                  </tr>
                </table>  
            </td>
            <td style="width:35%;border:2px solid #fff;font-size: 200%;">
                <table id="rh2" style="height:100%;width:100%;text-align:center;border-spacing: 0px;border:1px solid #000;<?=$bg_R2;?>">
                <tr>
                  <td style="width:5%;height: 30%;vertical-align: top"><label style="border-radius: 30px;background-color: black;color: white">&nbsp;3&nbsp;</label></td>
                  <td style="width:25%;border-right:1px solid #000;height: 30%;font-size: 120%;">RR RH</td>
                  <td style="font-size: 100%;word-break: break-all;"><?=$suffix1_R2;?></td>
                </tr>
                <tr>
                  <td colspan="3"  style="border-top:1px solid #000;">
                    <label style="font-size: 150%;font-weight: bold;"><?=$lifting_no_R2;?></label><br>
                    <label style="font-size: 100%;"><?=$model_R2;?></label><br>
                    <label style="font-size: 100%;font-weight: bold;"><?=$part_no_R2;?></label>
                  </td>
                </tr>
              </table>
            </td>
          <?php } ?>
            <td rowspan="2" style="padding-left: 20px;padding-right: 20px;">
              <table style="height:100%;width:100%;">
                  <tr>
                    <td style="height: 70%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>PALLET NO:</td>
                  </tr>
                  <tr>
                    <td style="border:2px solid #fff;font-size: 50px;text-align: center;"><?=$basepallet_no;?></td>
                  </tr>
                </table>

            </td>
          </tr>
          <tr>
            <td style="width:35%;border:2px solid #fff;font-size: 200%;">
              <table id="lh" style="height:100%;width:100%;text-align:center;border-spacing: 0px;border:1px solid #000;<?=$bg_L;?>">
                  <tr>
                    <td style="width:5%;height: 30%;vertical-align: top">
                      <label style="border-radius: 30px;background-color: black;color: white">&nbsp;2&nbsp;</label>
                    </td>
                    <td style="width:25%;border-right:1px solid #000;height: 30%;font-size: 120%;">FR LH</td>
                    <td style="font-size: 100%;word-break: break-all;"><?=$suffix1_L;?></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="border-top:1px solid #000;">
                      <label style="font-size: 150%;font-weight: bold;"><?=$lifting_no_L;?></label><br>
                      <label style="font-size: 100%;"><?=$model_L;?></label><br>
                      <label style="font-size: 100%;font-weight: bold;"><?=$part_no_L;?></label>
                    </td>
                  </tr>
                </table>  
            </td>
            <td style="width:35%;border:2px solid #fff;font-size: 200%;">
                <table id="rh" style="height:100%;width:100%;text-align:center;border-spacing: 0px;border:1px solid #000;<?=$bg_R;?>">
                <tr>
                  <td style="width:5%;height: 30%;vertical-align: top"><label style="border-radius: 30px;background-color: black;color: white">&nbsp;1&nbsp;</label></td>
                  <td style="width:25%;border-right:1px solid #000;height: 30%;font-size: 120%;">FR RH</td>
                  <td style="font-size: 100%;word-break: break-all;"><?=$suffix1_R;?></td>
                </tr>
                <tr>
                  <td colspan="3"  style="border-top:1px solid #000;">
                    <label style="font-size: 150%;font-weight: bold;"><?=$lifting_no_R;?></label><br>
                    <label style="font-size: 100%;"><?=$model_R;?></label><br>
                    <label style="font-size: 100%;font-weight: bold;"><?=$part_no_R;?></label>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="height:5px"></td>
          </tr>
          <tr>
           <td style="height:10%;border:2px solid #fff;background-color:yellow;color:#000;text-align: center;font-size: 30px;" >STAND BY KONFIRMASI SEAT
            </td>
            <td style="height:10%;border:2px solid #fff;background-color:green;color:#fff;text-align: center;;font-size: 30px;" >SEAT OK
            </td>
            <td style="height:10%;border:2px solid #fff;background-color:red;color:#fff;text-align: center;;font-size: 30px;" >SEAT NG
            </td>
          </tr>
        </table>

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
  }, 1000);
}

function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
    var file = "#";
    var randomNum = Math.round(Math.random() * 10000);
    var pos_no = "<?=$pos_no;?>";
    var basepallet_no = "<?=$basepallet_no;?>";
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
                    url :"<?=base_url("andon/result_fnqc?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
                    cache:false,
                    dataType: 'json',
                    data: "pos_no="+pos_no+"&basepallet_no="+basepallet_no+"&<?=$this->security->get_csrf_token_name();?>="+cv,                 
                    success: function(data){                       
                        if(data.status=='EMPTY'){
                           setInterval(function(){
                               window.location.href ="<?=base_url('andon/effline/'.$line_no.'?='.$this->encrypt->sha1(rand(1000,10000000)));?>";
                            },4000);
                        
                       }
                       if(data.jumlah>jumlah){
                        setInterval(function(){
                          location.reload();
                        },1000);
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