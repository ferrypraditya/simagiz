<?php
require_once('assets/lte/mpdf60/qrcode/qrcode.class.php');
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
      font-family: arial;
      color: #000;
      text-align: center;
      font-size: 12px;
    }
</style>
</head>
<body>
  <?php
  if($jumlah>0){
  $date =gmdate('Y-m-d',time()+60*60*7);
  if($jumlah<10){
    $height=100/10*$jumlah;
    $width=100;
  }else{
    $height=100;
    $width=100;
  }
  $persen=100/10;
  $z=0; foreach ($data_table as $key){  if($z % 10==0){ 
    if($jumlah % 10==1){
      $width=20;
    }
   ?>
<table>
  <tr>
    <td style="padding-top:5px; padding-left:5px">
<table style="text-align: center;border-spacing:0px;page-break-after: always;border-collapse: collapse;">
  <?php } 
  if($z % 5==0){?>
    <tr>
      <td style="padding:3px;height:<?=$persen;?> %;border:0px solid #444;text-align: center;">
  <?php }else{?>
    <td style="padding:3px;height:<?=$persen;?> %;border:0px solid #444;text-align: center;">
    <?php }?>
    <table>
      <tr>
        <td style="padding:0px;border:1px solid #444;border-radius: 5px;">
          <table style="width: 54.5mm;height:85.5mm;border-spacing: 0px;border-collapse: collapse;color: white;background-color: #3895D3;">
            <tr>
              <td style="border:1px solid #444;height:20mm;text-align: center;font-weight: bold;color: white;font-size: 16px;font-family: sans-serif;">
                <img src="<?=base_url('assets/img/logo.jpg?id='.time());?>" style="width:14mm;height:14mm;vertical-align: middle;margin-bottom: 2px;margin-top: 2mm;border-radius: 30px;"><br>
                <?=$owner;?>     
              </td>
            </tr>
            <tr>
              <td style="border:1px solid #444;text-align: center;background-color: white;color: black;font-size: 16px;font-weight: bold;">
                <img src="<?=base_url($key->web_path.'?id='.time());?>" style="width:23mm;height:23mm;vertical-align: middle;margin-bottom: 3px;padding-top: 2px;border-radius: 45px;"><br>
                <?=strtoupper($key->nama).'</br>'.$key->nik;?>
              </td>
            </tr>
            <tr>
              <td style="height: 5 mm;text-align: center;font-size: 18px;font-weight: bold;">
                <?=$title;?>
              </td>
            </tr>
            <tr>
              <td style="height: 3 mm;text-align: center;font-size: 12px;font-weight: bold;">
                <?=$key->user_level;?>
              </td>
            </tr>
           <tr>
            <td style="height: 18 mm;text-align: center;background-color: white;border:1px solid #444;">
              <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($key->idcard).'&amp;err='.urlencode('Q'));?>" style="width:15mm;height:15mm;text-align: center;margin-bottom: 1mm;padding-top: 2px;">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
    <?php $z=$z+1; if($z % 5==0){?>
    </td>
    </tr>
    <?php }else{?>
    </td>
    <?php } 
    if($z % 10==0 OR $z==$jumlah){ echo "</table></td></tr></table>"; } }
    }else{
    echo "DATA TIDAK DITEMUKAN";
    } ?>
    <script type="text/javascript">
    setTimeout(function() { 
     window.print();
    }, 100);
    </script>
    </body>
    </html>