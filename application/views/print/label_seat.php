<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html,
      body {
        height: 100%;
        width: 100%;
        margin: 0px;
        padding: 0px;
        font-size: 12px;
        font-weight: bold;
      }
      table,tr,td{
        padding-left: 2px;
      }
      .courses {
          page-break-before: always;
      }

      .courses:first-child {
          page-break-before: avoid;
      }
    </style>
  </head>
  <body>
    <?php foreach ($qd as $key) { ?>
  <table class="courses" style="width: 100%;height:100%;padding: 0px;font-family: sans-serif;border-spacing: 0px;">
    <tr>
      <td style="padding:3px">
        <table border="0" style="width: 100%;height:100%;padding: 0px;margin: 0px;border-spacing: 0px;text-align: left;border-color:#444;border-collapse: collapse;border-color: #999;border: 0.1mm solid #ccc;">
          <tr>
            <td colspan="2" style="text-align:center;font-size: 120%;border: 0.1mm solid #ccc;">
              Order Date : <?=$key->create_date;?>
            </td>
            <td>
              Code :
            </td>
            <td style="text-align:center;font-size: 200%;">
              <?=$key->code;?>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;font-size:200%;border: 0.1mm solid #ccc;">
              Assy Line #2 KAP
            </td>
            <td style="border-top: 0.1mm solid #ccc;border-bottom: 0.1mm solid #ccc;">
              Suffix :
            </td>
            <td style="text-align:center;font-size: 200%;border-top: 0.1mm solid #ccc;border-bottom: 0.1mm solid #ccc;">
              <?=$key->suffix;?>
            </td>
          </tr>
          <tr>
            <td style="width:35%;height: 5px;">
              Lift No.
            </td>
            <td rowspan="2" style="width:20%;text-align:center;padding: 0px;">
              <img
                    src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($key->qrcode).'&amp;err='.urlencode('Q'));?>"
                    style="width: 75px; height: 70px; text-align: center;"/>
            </td>
            <td style="width:10%;border-left: 0.1mm solid #ccc;">
              Grade :
            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td style="text-align:center;font-size: 250%;">
              <?=$key->lifting_no;?>
            </td>

            <td colspan="2" style="text-align:center;font-size:250%;border-left: 0.1mm solid #ccc;">
              <?=$key->grade;?>
            </td>
          </tr>
          <tr>
            <td colspan="2"  style="height: 5px;border-top: 0.1mm solid #ccc;border-right: 0.1mm solid #ccc;">
              Seat :
            </td>
            <td colspan="2" style="border-top: 0.1mm solid #ccc;">
              Part No :
            </td>
          </tr>
          <tr>
            <td colspan="2" style="font-size: 200%;border-right: 0.1mm solid #ccc;">
              <?=$key->description.' '.$key->side;?>
            </td>
            <td colspan="2" style="text-align:center;font-size: 200%;">
              <?=$key->part_no;?>
            </td>
          </tr>
          <tr>
            <td colspan="4" style="height:5px;border-top: 0.1mm solid #ccc;">
              Variant :
            </td>
          </tr>
          <tr style="font-size:120%">
            <td colspan="2">
              1. <?=$key->variant1;?>
            </td>
            <td colspan="2">
              3. <?=$key->variant3;?>
            </td>
            
          </tr>
          <tr style="font-size:120%">
            <td colspan="2">
              2. <?=$key->variant2;?>
            </td>
            <td colspan="2">
              4. <?=$key->variant4;?>
            </td>    
          </tr>
        </table>
        </td>
      </tr>
    </table>
  <?php } ?>
    <script type="text/javascript">
   window.print();
   var p = "<?=$print;?>";
   if(p=='L' || p=='R'){
    setTimeout(function() { 
        window.close();
    }, 100);
   }
   
</script>
  </body>
</html>
