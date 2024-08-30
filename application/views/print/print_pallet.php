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
      margin: auto;  
      padding: 0px;
      color: black;
    }
    table,tr,td{
      padding: 5px;
      vertical-align: middle;
      border: 1mm solid black;
    }


   
  @media print {
        .pagebreak { page-break-before: always; } /* page-break-after works, as well */
    }
  </style>
</head>
<body>
    <?php $i=1; $z=0; foreach ($data_table as $key) { ?>
    <div class="pagebreak" style="padding: 5px;font-size:28px;font-weight:bold;text-align:center;font-family: sans-serif;">
      <table border="0" style="width:100%;border-spacing: 0px;border-collapse: collapse;" >
        <tr style="font-size:115%">
          <td style="width:40%">
            ASSY <?=$key->shop;?>
          </td>
          <td colspan="2">
            <?=$key->pallet_name;?>
          </td>
        </tr>
        <tr>
          <td rowspan="4">
            <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($key->qrcode).'&amp;err='.urlencode('Q'));?>" style="width:150px;height:140px;text-align: center;">
          </td>
          <td colspan="2" style="text-align:center; text-transform: uppercase;">
            <?=$key->tampak;?>
          </td>
        </tr>
        <tr>
          <td style="text-align:left">
            PalletNo
          </td>
          <td style="width:17%">
            <?=$key->pallet_no;?>
          </td>
        </tr>
        <tr>
          <td style="text-align:left">
            Lantai
          </td>
          <td>
            <?=$key->lantai;?>
          </td>
        </tr>
        <tr>
          <td style="text-align:left">
            Kolom
          </td>
          <td>
            <?=$key->kolom;?>
          </td>
        </tr>
      </table>
  </div>
  <?php $z = $z + 1;
         
      } ?>
<script type="text/javascript">
        window.print();
</script>

</body>
</html>
