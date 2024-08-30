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
      margin: 0px;  
      padding: 0px;
      font-size: 11px;
    }
  
  </style>
</head>
<body>
<?php foreach ($data_seat as $key) {?>
<table style="width: 100%;height:100%;padding: 0px;font-family: sans-serif;border-spacing: 0px;border-collapse: collapse;">
  <tr>
    <td style="padding: 1px">
       <table style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;border:1.5px solid #000;">
         <tr>
          <td rowspan="2" style="text-align: center;vertical-align: middle;justify-content: center;align-items: center;border-right:1.5px solid #000;">
            <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($qr_seat).'&amp;err='.urlencode('Q'));?>" style="width: 35px;height: 35px;">
          </td>
          <td style="text-align: left;vertical-align: middle;font-size: 14px;font-weight: bold;">
            QC PASSED<small><br></small>
            <?=$key->grade;?><br>
            <?=substr($qr_seat,18,4).'-'.$key->code;?>
          </td>
         </tr>
         <tr>
          <td style="text-align: left;vertical-align: middle;<?php if(substr($key->code=='R',0,1)){ echo 'background-color: #000;color:#fff';}?>">
            <?=$key->item;?><br>
            <?=gmdate('d M Y H:i:s',time()+60*60*7);?>
          </td>
         </tr>
       </table>
    </td>
  </tr>
</table> 
<?php } ?>
<script type="text/javascript">
   window.print();
   var re="<?=$re;?>";
   if(re!='re'){
    setTimeout(function() { 
          window.close();
     }, 10);
   }
   
</script>

</body>
</html>
