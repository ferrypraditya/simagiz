<?php
require_once('assets/lte/mpdf60/qrcode/qrcode.class.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?=base_url('assets/lte/dist/css/adminlte.min.css');?>">
  <style type="text/css">
    html,body { 
      height: 100%;
      width: 100%;
      margin: 0px;  
      padding: 0px;
      color: black;
    }
    table,tr,td{
      padding: 5px;
      vertical-align: middle;
    }
  @media print {
        .pagebreak { page-break-before: always; } /* page-break-after works, as well */
    }
  </style>
</head>
<body>
    <?php $i=1; $z=0; foreach ($data_table as $key) {
      if ($z % 10 == 0) { ?>
        <div class="row m-1 pagebreak">
        <?php } ?>
    <div class="col-6 p-2 text-xl text-center text-bold">
      <table border="1" style="width:100%;border-spacing: 0px;border-collapse: collapse;">
        <tr style="font-size:120%">
          <td style="width:30%">
            ASSY <?=$key->shop;?>
          </td>
          <td colspan="3">
            <?=$key->pallet_name;?>
          </td>
        </tr>
        <tr>
          <td colspan="2" rowspan="3">
            <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($key->qrcode).'&amp;err='.urlencode('Q'));?>" style="width:150px;height:140px;text-align: center;">
          </td>
          <td class="text-left">
            PalletNo
          </td>
          <td style="width:17%">
            <?=$key->pallet_no;?>
          </td>
        </tr>
        <tr>
          <td class="text-left">
            Lantai
          </td>
          <td>
            <?=$key->lantai;?>
          </td>
        </tr>
        <tr>
          <td class="text-left">
            Kolom
          </td>
          <td>
            <?=$key->kolom;?>
          </td>
        </tr>
      </table>
    </div>
  <?php $z = $z + 1;
        if ($z % 10 == 0) {
              echo "</div>";
            } 
      } ?>
<script type="text/javascript">
        window.print();
</script>

</body>
</html>
