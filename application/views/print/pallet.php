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
    }
  
  </style>
</head>
<body>
 
    <?php $i=1; $z=0; foreach ($data_table as $key) {
      if($z % 30==0){ ?>
    <table style="text-align: center;border-spacing:0px;page-break-after: always;">
      <?php }
     $j=$i % 5;
    if($j==1){ echo"<tr style='height: 140px'><td style='padding:10px'>"; }else{ echo"<td style='padding:10px'>";} ?>
        <table border="1" style="width: 100%;height:100%;padding: 0px;font-family: sans-serif;font-size:12px;text-align: center;">
          <tr>
            <td>
               <?=gmdate('Y-m-d H:i:s',time()+60*60*7);?>
            </td>
          </tr>
          <tr>
           <td style="text-align: center;vertical-align: middle;">
             <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($key->basepallet_no).'&amp;err='.urlencode('Q'));?>" style="width: 100px;height: 95px;"> 
            </td>
          </tr>
          <tr>
            <td style="font-size: 20px;">
               <?=$key->basepallet_no;?>
            </td>
          </tr>
        </table>
      <?php $z=$z+1; if($j==0){ echo"</td></tr>"; }else{ echo"</td>";} $i=$i+1; 
      if($z % 30==0 OR $z==$jumlah){ echo "</table>"; } }?>
  </table>
<script type="text/javascript">
        window.print();
</script>

</body>
</html>
