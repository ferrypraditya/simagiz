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
      font-size: 13px;
      color: #000;
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
    }
    table,tr,td{
      padding: 1px;
    }
  
  </style>
</head>
<body>
<?php if($hd_ship->shop==1){ $lop=3; }else{ $lop=3; }
for($lo=1;$lo<=$lop;$lo++){ ?>
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
                        <td rowspan="2" style="border-right: 0px solid #fff;font-size: 150%;text-align: left;">KANBAN SETTING</td>
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
                  <td style="width:12%;height: 5%">Input Date</td>
                  <td style="width:25%"><?=$hd_ship->calc_time.' '.$hd_ship->prod_shift;?></td>
                  <td style="width:12%">Print Date</td>
                  <td style="width:20%"><?=gmdate('Y-m-d H:i:s',time()+60*60*7);?></td>   
                </tr>
                <tr>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, FR</td>
                      </tr>
                      <?php if($hd_ship->shop==2){ ?>
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
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, FR'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
                      </tr>
                    <?php } } 
                        }else{ 
                          $lift_x=intval($lift_min);
                          $lift_minx=intval($lift_min);
                          for($x=1;$x<=4;$x++){
                            $batas_a=$x*4;
                            $batas_b=(($x-1)*4)+1;
                            $lift_x=$lift_minx+3;
                            if($lift_x>=10000){
                                $lift_x=$lift_x-9999;
                             }
                           
                            if($lift_x<10){
                              $lift_x='000'.$lift_x;
                            }elseif ($lift_x>=10 and $lift_x<100) {
                              $lift_x='00'.$lift_x;
                            }elseif ($lift_x>=100 and $lift_x<1000) {
                              $lift_x='0'.$lift_x;
                            }else{
                              $lift_x=$lift_x;
                            }
                            
                            if($lift_minx>=10000){
                                $lift_minx=$lift_minx-9999;
                             }
                            if($lift_minx<10){
                              $lift_minx='000'.$lift_minx;
                            }elseif ($lift_minx>=10 and $lift_minx<100) {
                              $lift_minx='00'.$lift_minx;
                            }elseif ($lift_minx>=100 and $lift_minx<1000) {
                              $lift_minx='0'.$lift_minx;
                            }else{
                              $lift_minx=$lift_minx;
                            }
                             ?>

                            <tr>
                              <td colspan="6" >Lift. <?=$lift_minx.'~'.$lift_x;?></td>
                            </tr>
                            <?php if($x==1){ ?>
                            <tr>
                              <td>No</td>
                              <td>ID Seat</td>
                              <td colspan="2" >RH</td>
                              <td colspan="2" >LH</td>
                            </tr>
                            <?php } if($x==1){
                             $i=1; foreach ($data_ship1 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                            <?php $i=$i+1;}
                              }elseif($x==2){
                             $i=1; foreach ($data_ship2 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                        <?php   $i=$i+1;}
                         }elseif($x==3){
                             $i=1; foreach ($data_ship3 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                        <?php   $i=$i+1;}
                          }elseif($x==4){
                             $i=1; foreach ($data_ship4 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                        <?php   $i=$i+1;}
                            }
                             $lift_minx=intval($lift_minx)+4;
                            }} ?>

                    </table>
                  </td>
                  <td colspan="2" style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, NO.2</td>
                      </tr>
                      <?php if($hd_ship->shop==2){ ?>
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
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, NO.2'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
                      </tr>
                    <?php } }
                      }else{ ?>
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
                        if($row->item=='SEAT ASSY, NO.2'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
                      </tr>
                    <?php } }
                      } ?>
                    </table>
                  </td>
                  <td style="padding: 0px;vertical-align: top;border:0px solid #000">
                    <table border="1" style="width:100%;padding: 0px;border-spacing: 0px;border-color:black;border:0px solid #000;border-collapse: collapse;">
                      <tr>
                        <td colspan="6" style="font-weight: bold;">SEAT ASSY, RR</td>
                      </tr>
                      <?php if($hd_ship->shop==2){ ?>
                      <tr>
                        <td colspan="6">Lift. <?=$lift_min.'~'.$lift_max;?></td>
                      </tr>
                       
                      <tr>
                        <td>No</td>
                        <td>ID Seat</td>
                        <td colspan="2" >RH</td>
                        <td colspan="2" >LH</td>
                      </tr>
                      <?php  $i=1; foreach ($data_ship as $row) {
                        if($row->address=='Bawah' AND $row->item=='SEAT ASSY, RR'){
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
                      </tr>
                    <?php } } 
                      }else{ 
                          $lift_x=intval($lift_min);
                          $lift_minx=intval($lift_min);
                          for($x=1;$x<=2;$x++){
                            $batas_a=$x*8;
                            $batas_b=(($x-1)*8)+1;
                            $lift_x=$lift_minx+7;
                            if($lift_x>=10000){
                                $lift_x=$lift_x-9999;
                             }
                           
                            if($lift_x<10){
                              $lift_x='000'.$lift_x;
                            }elseif ($lift_x>=10 and $lift_x<100) {
                              $lift_x='00'.$lift_x;
                            }elseif ($lift_x>=100 and $lift_x<1000) {
                              $lift_x='0'.$lift_x;
                            }else{
                              $lift_x=$lift_x;
                            }
                            
                            if($lift_minx>=10000){
                                $lift_minx=$lift_minx-9999;
                             }
                            if($lift_minx<10){
                              $lift_minx='000'.$lift_minx;
                            }elseif ($lift_minx>=10 and $lift_minx<100) {
                              $lift_minx='00'.$lift_minx;
                            }elseif ($lift_minx>=100 and $lift_minx<1000) {
                              $lift_minx='0'.$lift_minx;
                            }else{
                              $lift_minx=$lift_minx;
                            }
                             ?>

                            <tr>
                              <td colspan="6" >Lift. <?=$lift_minx.'~'.$lift_x;?></td>
                            </tr>
                            <?php if($x==1){ ?>
                            <tr>
                              <td>No</td>
                              <td>ID Seat</td>
                              <td colspan="2" >RH</td>
                              <td colspan="2" >LH</td>
                            </tr>
                             <?php } if($x==1){
                             $i=1; foreach ($data_ship5 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                            <?php $i=$i+1;}
                              }elseif($x==2){
                             $i=1; foreach ($data_ship6 as $row) { ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row->idseat;?></td>
                              <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->rh;?></td>
                              <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                              <td style="width: 30px"><?=$row->lh;?></td>
                            </tr>
                        <?php   $i=$i+1;}
                          }
                             $lift_minx=intval($lift_minx)+8;
                            }} ?>
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
                        <td rowspan="2" style="border-right: 0px solid #fff;font-size: 150%;text-align: left;">KANBAN SETTING LANTAI ATAS</td>
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
                  <td style="width:12%;height: 5%">Input Date</td>
                  <td style="width:25%"><?=$hd_ship->calc_time.' '.$hd_ship->prod_shift;?></td>
                  <td style="width:12%">Print Date</td>
                  <td style="width:20%"><?=gmdate('Y-m-d H:i:s',time()+60*60*7);?></td>   
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
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, FR'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
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
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, NO.2'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
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
                        if($row->address=='Atas' AND $row->item=='SEAT ASSY, RR'){ 
                           ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$row->idseat;?></td>
                        <td><?php if($row->rh!='0'){ echo $row->jobrh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->rh;?></td>
                        <td><?php if($row->lh!='0'){ echo $row->joblh;  }else{ echo '-'; } ?></td>
                        <td style="width: 30px"><?=$row->lh;?></td>
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
<?php } ?>
<script type="text/javascript">
   window.print();
   var p = "<?=$print;?>";
   if(p=='L'){
    setTimeout(function() { 
        window.close();
    }, 100);
   }
</script>

</body>
</html>
