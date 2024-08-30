<?php
require_once('assets/lte/mpdf60/qrcode/qrcode.class.php');
$qrcs=$cseat->qrcode;
$x=1;
$y=6;
$z=6;
$page=ceil($jumlah/$z);
if($jumlah==0){
  $page=1;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<style type="text/css">
  html,body { 
      height: 100%;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: sans-serif;
      background-color: #fff;
      color: #000;
      font-size: 8px;
      text-align: center;
    }
</style>
  <!-- Ionicons -->
</head>
<body>
<?php for($j=1; $j<=$page; $j++){ ?>
<table style="height:98%;width:100%;border-spacing:0px;padding:10px;page-break-after: always;">
  <tr>
    <td style="border:1px solid #000;padding: 7px;vertical-align: top">
      <table style="height:100%;width:100%;border-spacing:0px;padding: 0px;">
        <tr>
          <td rowspan="2" style="width:120px;height: 30px;border: 1px solid #000;padding: 0px;">
            <img style="vertical-align: middle;height: 50px;margin: 0px;" src="<?=base_url('assets/img/logo.jpg');?>"/>
          </td>
          <td  style="height: 20px;width: 60%;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 18px;font-weight: bold;">
            CHECK SHEET IDENTIFIKASI NG & REPAIR
          </td>
          <td rowspan="2" style="border: 1px solid #000;vertical-align: middle;">
            <table style="height:100%;width:100%;border-spacing:0px;font-size: 10px;vertical-align: middle;text-align: left">
                <tr>
                  <td>
                    Date
                  </td>
                  <td>
                    :
                  </td>
                  <td>
                    <?=gmdate('d-M-Y',time()+60*60*7);?>
                  </td>
                </tr>
                <tr>
                  <td>
                   Time
                  </td>
                  <td>
                    :
                  </td>
                  <td>
                    <?=gmdate('H:i:s',time()+60*60*7);?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Item
                  </td>
                  <td>
                    :
                  </td>
                  <td>
                    <?=$cseat->seat_code.' '.$cseat->side;?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Model
                  </td>
                  <td>
                    :
                  </td>
                  <td>
                    <?=$cseat->model.'-'.$cseat->code;?>
                  </td>
                </tr>
              </table>
          </td>
        </tr>
        <tr>
          <td style="border-bottom: 1px solid #000;vertical-align: middle;height: 12px;padding: 0px;">
            <table style="width: 100%;height:12px;border-spacing: 0px;font-size:12px">
                  <tr>
                    <td>Grade:</td>
                    <td><?=$cseat->grade;?> Suffix : <?=$cseat->suffix.' Lifting: '.$cseat->lifting_no;?></td>
                    <td>Seat Number:</td>
                    <td><?=$cseat->part_no;?></td>
                  </tr>
                </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="height:12px;border-left: 1px solid #000;border-right: 1px solid #000;font-weight: bold;background-color: #999;text-align: center;padding: 0px;font-size: 12px;">
            PROBLEM
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding: 0px;border-top: 1px solid #000;height: 45px;">
              <table style="height:100%;width:100%;border-spacing:0px;font-size: 12px;vertical-align: middle;">
                <?php if(!empty($data_repair)){
                  $i=1; foreach ($data_repair as $key) { 
                   
                    if($i>=$x AND $i<=$y){
                   ?>
                <tr>
                  <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom:1px solid #000;height: 35px;width: 120px;">
                    <?=$i;?>
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;width: 30%">
                   <img style="vertical-align: middle;" src="<?=base_url('gambar/problemno/'.$part_no.'_'.$key->problem_no.'.jpg');?>"  width="80" height="40" />
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;width: 30%">
                    <?=$key->child_part_name;?><br>
                    (<?=$key->problem;?>)
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;">
                    <?=$key->child_part_no;?><br>
                    <img style="vertical-align: middle;" src="<?=base_url('gambar/childpart/'.$key->child_part_no.'.jpg');?>"  width="80" height="40" />
                  </td>
                </tr>
              <?php } $i=$i+1; }}else{?>
                <tr>
                  <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom:1px solid #000;height:50px;width: 120px;">
                    &nbsp;
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;width: 30%">
                   &nbsp;
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;width: 30%">
                    &nbsp;
                  </td>
                  <td style="border-right: 1px solid #000;border-bottom:1px solid #000;">
                    &nbsp;
                  </td>
                </tr>
              <?php } ?>
              </table>
          </td>
        </tr>
        
        <tr>
            <td colspan="3" style="height:12px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;background-color: #999;font-size: 12px;font-weight: bold">HISTORY REPAIR SEAT</td>
        </tr>
        <tr>
            <td colspan="3" style="height: 50px">
              <table style="width: 100%;height: 100%;border-spacing: 0px;font-size: 12px;">
                  <tr>
                    <td colspan="3" style="height:10px;text-align:left;">Ganti Part:</td>
                  </tr>
                  <tr>
                    <td style="width:45%;height: 40px">
                      <table style="width: 100%;height: 100%;border-spacing: 0px;text-align:center;font-size: 11px">
                          <tr>
                            <td style="width:10%;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000">No</td>
                            <td style="border-top:1px solid #000;border-right:1px solid #000">Item Part</td>
                          </tr>
                          <tr>
                            <td style="border:1px solid #000;">1<br />2<br />3<br />4<br />5</td>
                            <td style="border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000">&nbsp;</td>
                          </tr>
                        </table>

                    </td>
                    <td style="width:10%">&nbsp;</td>
                    <td style="width:45%;height: 40px">
                      <table style="width: 100%;height: 100%;border-spacing: 0px;text-align:center;font-size: 11px">
                          <tr>
                            <td style="width:10%;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000">No</td>
                            <td style="border-top:1px solid #000;border-right:1px solid #000">Item Part</td>
                          </tr>
                          <tr>
                            <td style="border:1px solid #000">6<br />7<br />8<br />9<br />10</td>
                            <td style="border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000">&nbsp;</td>
                          </tr>
                        </table>
                    </td>
                  </tr>
                </table>

            </td>
          </tr>
        <tr>
            <td colspan="3" style="height: 40px">
                <table style="width:100%;height: 100%;border-spacing: 1px;text-align:center;font-size: 11px">
                  <tr>
                    <td colspan="4" style="text-align:left">Proses Delta &quot;S&quot; :</td>
                  </tr>
                  <tr>
                    <td style="width:5%">No</td>
                    <td style="width:45%">Item Part</td>
                    <td style="width:10%">Check</td>
                    <td style="width:40%">Standar Torque</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td style="text-align:left">Bolt Track (Inner/Outer)</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>31 N.m</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td style="text-align:left">Nut Leg Assy</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>31 N.m</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td style="text-align:left">Bolt S/Belt</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>31 N.m</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td style="text-align:left">Bolt Lock</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>31 N.m</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td style="text-align:left">Nut Track Kasage (Inner/Outer)</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>31 N.m</td>
                  </tr>
                </table>
            </td>
          </tr>
        <tr>
            <td colspan="3" style="padding-bottom: 5px;height: 60px">
                <table style="width:100%;height: 100%;border-spacing: 0px;text-align:center;font-size: 12px">
                  <tr>
                    <td rowspan="2" style="border:1px solid #000;text-align: left;vertical-align: top">Problem Other :</td>
                    <td rowspan="2" style="width: 5px;">&nbsp;</td>
                    <td style="width: 20%;height: 20px;border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;">Henkaten Repairman</td>
                    <td style="width: 20%;border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;">PIC Repairman</td>
                  </tr>
                  <tr>
                   <td style="border-bottom: 1px solid #000;border-left: 1px solid #000;">
                   &nbsp;
                  </td>
                  <td style="border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;height: 45px;">
                    &nbsp;
                  </td>
                  </tr>
                </table>
            </td>
          </tr>
        <tr>
            <td colspan="3" style="height:12px;border:1px solid #000;background-color: #999;font-size: 12px;font-weight: bold;padding: 0px;">FINAL CHECK AFTER REPAIR</td>
        </tr>
        <tr>
            <td colspan="3" style="height: 40px">
              <table style="width:100%;height: 100%;border-spacing: 1px;text-align:center;font-size: 11px">
                  <tr>
                    <td style="width:5%">No</td>
                    <td style="width:40%">Item Point Check</td>
                    <td style="width:10%">Check</td>
                    <td style="width:5%">&nbsp;</td>
                    <td style="width:40%">Standar Torque</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td style="text-align:left">Kelengkapan Part After Repair</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td rowspan="4" style="border:1px solid #000">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td style="text-align:left">Actual Part NG (Part yang diganti)</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td style="text-align:left">Actual Delta &quot;S&quot; After Repair</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td style="text-align:left">Actual Function Seat After Repair</td>
                    <td style="border:1px solid #000">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </td>
          </tr>
        <tr>
          <td colspan="3" style="height: 14px;padding: 0px;">
            <table style="width: 100%;height: 16;border-spacing: 0px;font-size: 11px;font-weight: bold;padding: 0px;">
              <tr>
                <td style="width:20%;text-align: left">JUDGMENT</td>
                <td style="width:2%">:</td>
                <td style="width:10%;text-align: right;">OK</td>
                <td style="width:10%;text-align: center;">/</td>
                <td style="text-align: left">NG</td>
              </tr>
              <tr>
                <td style="text-align: left">Keterangan NG</td>
                <td>:</td>
                <td colspan="3">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="height: 70px">
              <table style="height:100%;width:100%;border-spacing:0px;font-size: 12px;vertical-align: middle;">
                <tr>
                  <td rowspan="2" style="width:30%;text-align: right">
                   <img style="vertical-align: middle;" src="<?=base_url('assets/img/panahrepair.jpg');?>"  width="210" height="50" />
                  </td>
                  <td rowspan="2" style="width:15%;text-align: center;border: 1px solid #000;padding: 5px;">
                     <img src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($qrcs).'&amp;err='.urlencode('Q'));?>" style="width: 80px;height:70px;text-align: center;">
                                     
                  </td>
                  <td rowspan="2" style="width: 10%;">
                    &nbsp;
                  </td>
                  <td style="width: 22%;height: 20px;border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;">
                   Henkaten PIC QA Repairman
                  </td>
                  <td style="width: 22%;border-top: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;">
                    PIC QA Repairman
                  </td>
                </tr>
                <tr>
                  <td style="border-bottom: 1px solid #000;border-left: 1px solid #000;">
                   &nbsp;
                  </td>
                  <td style="border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;height:40px;">
                    &nbsp;
                  </td>
                </tr>
              </table>
          </td>
        </tr>
      </table>
      <?='<br>Page '.$j.'/'.$page; $x=$x+$z; $y=$y+$z;?>
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
