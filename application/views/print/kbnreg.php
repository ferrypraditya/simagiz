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
      font-size: 16px;
      color: #000;
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
    }
    table,tr,td{
      padding: 2px;
    }
  
  </style>
</head>
<body>
<table style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-collapse: collapse;page-break-after: always;">
  <tr>
    <td style="padding: 20px;vertical-align: middle;">
      <table style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;">
        <tr>
          <td style="height: 50%;">
              <table border="1" style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;border:0px solid #000;">
                <tr>
                  <td colspan="4" style="padding: 0px;height: 5%">
                    <table border="1" style="height:100%;width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;">
                      <tr>
                        <td rowspan="2" style="border-right: 0px solid #fff;font-size: 180%;text-align: left;">KANBAN SETTING</td>
                        <td style="width: 80px">Total Lift</td>
                        <td style="height: 30%;width: 70px">Lift. No</td>
                        <td style="width: 80px">Total Pcs</td>
                      </tr>
                      <tr>
                        <td><?=$hd_ship->totlift;?></td>
                        <td><?=$lift_min.'~'.$lift_max;?></td>
                        <td style="font-size: 130%"><?=$hd_ship->total;?></td>
                      </tr>
                    </table>
                  </td>
                  <td rowspan="2"  style="padding: 0px;">
                    <table border="1" style="height:100%;width:100%;padding: 0px;border-spacing: 0px;border-color:black;text-align: center;border:0px solid #000">
                      <tr>
                        <td style="height: 30%">SHOP</td>
                        <td>TRIP</td>
                        <td rowspan="2">
                          <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($hd_ship->lotid).'&amp;err='.urlencode('Q'));?>" style="width: 60px;height:60px;text-align: center;">
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 200%"><?=$hd_ship->shop;?></td>
                        <td style="font-size: 200%"><?=$hd_ship->trip;?></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="width:12%;height: 5%">Print Date</td>
                  <td style="width:25%"><?=$hd_ship->calc_time.' '.$hd_ship->prod_shift;?></td>
                  <td style="width:12%">Setting Date</td>
                  <td style="width:20%">&nbsp;</td>   
                </tr>
                <tr>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, FR</td>
                      </tr>
                      <tr>
                        <td colspan="6" >Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, FR'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
                      </tr>
                    <?php } } ?>
                    </table>
                  </td>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, NO.2</td>
                      </tr>
                      <tr>
                        <td colspan="6">Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, NO.2'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
                      </tr>
                    <?php } } ?>
                    </table>
                  </td>
                  <td style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, RR</td>
                      </tr>
                      <tr>
                        <td colspan="6">Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, RR'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
                      </tr>
                    <?php } } ?>
                    </table>
                  </td>   
                </tr>
              </table>
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;
          </td>
        </tr>
        <tr>
          <td>
            <table border="1"  style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;border:0px solid #000;">
                <tr>
                  <td colspan="4" style="padding: 0px;height: 5%">
                    <table border="1" style="height:100%;width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;">
                      <tr>
                        <td rowspan="2" style="border-right: 0px solid #fff;font-size: 180%;text-align: left;">KANBAN SETTING LANTAI ATAS</td>
                        <td style="width: 80px">Total Lift</td>
                        <td style="height: 30%;width: 70px">Lift. No</td>
                        <td style="width: 80px">Total Pcs</td>
                      </tr>
                      <tr>
                        <td><?=$hd_ship->totlift;?></td>
                        <td><?=$lift_min.'~'.$lift_max;?></td>
                        <td style="font-size: 130%"><?=$hd_ship->total;?></td>
                      </tr>
                    </table>
                  </td>
                  <td rowspan="2"  style="padding: 0px;">
                    <table border="1" style="height:100%;width:100%;padding: 0px;border-spacing: 0px;border-color:black;text-align: center;border:0px solid #000">
                      <tr>
                        <td style="height: 30%">SHOP</td>
                        <td>TRIP</td>
                        <td rowspan="2">
                          <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($hd_ship->lotid).'&amp;err='.urlencode('Q'));?>" style="width: 60px;height:60px;text-align: center;">
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 200%"><?=$hd_ship->shop;?></td>
                        <td style="font-size: 200%"><?=$hd_ship->trip;?></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="width:12%;height: 5%">Print Date</td>
                  <td style="width:25%"><?=$hd_ship->calc_time.' '.$hd_ship->prod_shift;?></td>
                  <td style="width:12%">Setting Date</td>
                  <td style="width:20%">&nbsp;</td>   
                </tr>
                <tr>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, FR</td>
                      </tr>
                      <tr>
                        <td colspan="6" >Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, FR'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
                      </tr>
                    <?php } } ?>
                    </table>
                  </td>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, NO.2</td>
                      </tr>
                      <tr>
                        <td colspan="6">Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, NO.2'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
                      </tr>
                    <?php } } ?>
                    </table>
                  </td>
                  <td style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, RR</td>
                      </tr>
                      <tr>
                        <td colspan="6">Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, RR'){ $code=trim($row->code);
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($code=='RH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='RH'){ echo $row->total; }else{ echo '0'; } ?></td>
                        <td><?php if($code=='LH'){ echo $row->idseat.'-'.$row->code;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?php if($code=='LH'){ echo $row->total; }else{ echo '0'; } ?></td>
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
</table>
<?php foreach ($data_line as $key) { if($key->line_no!=1 AND $key->line_no!=4 AND $key->line_no!=5){  ?>
<table style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;border-collapse: collapse;page-break-after: always;">
  <tr>
    <td style="padding: 20px;vertical-align: middle;">
       <table style="width: 100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;">
         <tr>
          <td style="text-align: left;font-size: 300%">
            KANBAN PRODUKSI
          </td>
         </tr>
         <tr>
          <td style="padding-top: 10px">
            <table style="width: 100%;padding: 0px;border-spacing: 0px;border-color:black;font-weight: normal;border-collapse: collapse;font-size: 130%">
              <tr>
                <td style="width:15%;text-align: left">
                  Order From
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  PCD
                </td>
                <td style="width:15%;text-align: left;">
                  Tanggal Order
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  <?=substr($key->calc_time,0,10);?>
                </td>
                <td style="width: 25%">
                </td>
              </tr>
              <tr>
                <td style="text-align: left">
                  To
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  Line <?=$key->line_no;?>
                </td>
                <td style="text-align: left;">
                  Jam Order
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  <?=substr($key->calc_time,10,9);?>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td style="text-align: left">
                  Takt Time
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  <?=round($key->takt_time/60,1);?>
                </td>
                <td style="text-align: left;">
                  No Order
                </td>
                <td>
                  :
                </td>
                <td style="text-align: left">
                  <?=$key->lotid;?>
                </td>
                <td>
                </td>
              </tr>
            </table>
          </td>
         </tr>
         <tr>
          <td style="padding-top: 10px">
            <table border="1" style="width: 100%;padding: 0px;border-spacing: 0px;border-color:black;border-collapse: collapse;font-weight: normal;">
              <tr>
                <td style="height: 50px">
                  NO
                </td>
                <td>
                  PART NUMBER
                </td>
                <td>
                  JOB NUMBER
                </td>
                <td>
                  ID SEAT
                </td>
                <td>
                  CODE
                </td>
                <td>
                  PART NAME
                </td>
                <td>
                  SUFFIX
                </td>
                <td>
                  VARIANT
                </td>
                <td>
                  QTY LOT
                </td>
                <td>
                  PROD PLAN
                </td>
                <td>
                  JML KARTU
                </td>
                <td style="width: 5%">
                  CHECK
                </td>
              </tr>
              <?php $i=1; foreach ($data_prod as $val) { if($key->line_no==$val->line_no) { ?>
              <tr>
                <td style="height: 30px">
                  <?=$i++;?>
                </td>
                <td>
                  <?=$val->part_no;?>
                </td>
                <td>
                  <?=$val->idseat.'-'.$val->code;?>
                </td>
                <td>
                  <?=$val->idseat;?>
                </td>
                <td>
                  <?=$val->code;?>
                </td>
                <td>
                  <?=$val->item;?>
                </td>
                <td>
                  <?=$val->suffix_master;?>
                </td>
                <td>
                  <?=$val->variant;?>
                </td>
                <td>
                  <?=$val->lot;?>
                </td>
                <td>
                  <?=$val->plan;?>
                </td>
                <td>
                  <?=$val->plan/$val->lot;?>
                </td>
                <td>
                  &nbsp;
                </td>
              </tr>
            <?php } }?>
            </table>

          </td>
         </tr>
         <tr>
          <td  style="padding-top: 10px">
              <table style="width: 100%;padding: 0px;border-spacing: 0px;border-color:black;font-weight: normal;border-collapse: collapse;">
                <tr>
                  <td style="width:50%;text-align: left">
                    Distribusi : <br>
                    1. Jalur Line (1,2,3,4,5,6,7,8)<br>
                    2. SPS Jalur Line (1,2,3,4,5,6,7,8)<br>
                  </td>
                  <td>
                    PIC Setting<br><br><br>
                    (_________________________)
                  </td>
                  <td>
                    PCD Planning<br><br><br>
                    (_________________________)
                  </td>
                </tr>
              </table>
          </td>
         </tr>
       </table>
    </td>
  </tr>
</table> 
<?php } } ?>
<script type="text/javascript">
   window.print();
   
</script>

</body>
</html>
