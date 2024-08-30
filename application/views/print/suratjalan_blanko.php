<?php
require_once('assets/lte/mpdf60/qrcode/qrcode.class.php');
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Surat Jalan</title>
</head>

<body>
<table border="0" cellspacing="0" style="width: 100%;height:100%;font-family: Arial;font-size:10px;">
    
  <tr valign="top" height="14%">
    <td >
      <table style="width: 100%;height:100%;">
          <tr valign="top">
            <td width="40%">
            <div style=" text-align:left;font-size:14px; font-weight:bold;">&nbsp;</div>
            <div style=" text-align:left;font-size:10px; ">
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
            </div>
            </td>
            <td  width="33%" style=" text-align:center;font-size:18px; font-weight:bold;">&nbsp;</td>
            <td align="center" valign="middle"><img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($sj_no).'&amp;err='.urlencode('Q'));?>" style="width: 65px;height: 65px;"></td>
          </tr>
        </table>

    </td>
  </tr>
  <tr height="3%">
    <td style="font-family: Arial;font-size:12px;">&nbsp;T022-1</td>
  </tr>
  <tr height="3%" >
    <td>
      <table style="width: 100%;height:100%;font-family: Arial;font-size:12px;">
          <tr>
            <td width="37%" style="text-align:right; font-weight:bold;">&nbsp;</td>
            <td valign="top" width="36%">&nbsp;<?=$sj_no;?> <b>Trip No : </b> <?=$trip_no;?></td>
            <td align="right" >&nbsp; </td>
            <td valign="top" align="left" width="19%" nowrap><?=gmdate('d M Y',time()+60*60*7);?></td>
          </tr>
        </table>

    </td>
  </tr>
  <tr height="2%">
    <td>
      <table style="width: 100%;height:100%;font-family: Arial;font-size:10px; font-weight:bold;">
          <tr>
            <td width="65%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    </td>
  </tr>
  <tr height="8%" valign="top"> 
    <td>
      <table style="width: 100%;height:100%;font-family: Arial;font-size:12px;">
          <tr valign="top">
            <td width="2%"></td>
            <td width="50%">
              PT. ASTRA DAIHATSU MOTOR<br>
                Kawasan Industri Surya Cipta<br>
                Jl. Surya Pratama KAV, 1<br>
            </td>
            <td>
              PT. TOYOTA MOTOR MANUFACTURING INDONESIA<br>
                Jl. Permata Eaya Lot DD-1, Kawasan Industri KIIC<br>
                Karawang 41361 - Jawa Barat, INDONESIA<br>
                Telp. (021) 890 4222<br>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr height="1%">
    <td style="font-family: Arial;font-size:10px;">&nbsp; </td>
  </tr>
  <tr height="2%">
    <td style="font-family: Arial;font-size:10px;">&nbsp; </td>
  </tr>
  <tr valign="top">
    <td>
      <table border="0"  cellspacing="0" style="width: 100%;font-family: Arial;font-size:12px; border:medium">
          <tr align="center" height="10%" style="font-family: Arial;font-size:10px; font-weight:bold;">
            <td width="6%">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td width="38%">&nbsp;</td>
            <td >&nbsp;</td>
          </tr>
          <?php $i=1; foreach ($data_table as $key) { ?>
              <tr style="height: 20px">
                <td style="text-align: center;">
                  <?=$i;?>
                </td>
                <td width="14%" style="text-align: left">
                  <?=$key->part_no;?>
                </td>
                <td width="9%" style="text-align: left;">
                  &nbsp;
                </td>
                <td style="text-align: left">
                  <?=$key->part_name;?>
                </td>
                <td style="text-align: center;">
                  <?=$key->jumlah;?>
                </td>
              </tr>
            <?php $i=$i+1; } ?>
        </table>

    </td>
  </tr>
  <tr height="1%">
    <td>&nbsp;</td>
  </tr>
  <tr height="15%">
    <td>
      <table style="width: 100%;height:100%;font-family: Arial;font-size:10px;">
          <tr>
            <td width="75%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr height="60%" valign="bottom">
            <td>&nbsp;</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>YUTAKA TSUJIMURA</td>
          </tr>
        </table>

    </td>
  </tr>
</table>
<script type="text/javascript">
   setTimeout(function() { 
        window.print();
        window.close();
   }, 10);
</script>
</body>
</html>