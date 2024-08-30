<table style="height:100%;width:100%;border-spacing: 0px;border-collapse: collapse;" class="header">
                <tr style="font-size: 120%;background-color:blue">
                  <td colspan="<?=$jumlah_zona;?>" style="border:2px solid white;height:2%;">STORAGE</td>
                </tr>
                <tr style="font-size: 150%;background-color:#777">
                  <td colspan="<?=ceil($jumlah_zona/2);?>" style="border:2px solid white;height: 7%">REAR 1 RH/LH</td>
                  <td colspan="<?=$jumlah_zona-ceil($jumlah_zona/2);?>" style="border:2px solid white;">FRONT RH/LH + REAR 2</td>        
                </tr>
                <tr style="font-size: 150%;background-color:#777">
                  <?php foreach ($data_st as $key) { ?>
                  <td style="border:2px solid white;height: 7%;width:<?=100/$jumlah_zona;?>%"><?=$key->zona;?></td>
                  <?php } ?>

                </tr>
                <tr style="font-size: 150%;">
                  <?php foreach ($data_st as $key) { ?>
                  <td style="border:2px solid white;"><?=$key->grade;?></td>
                  <?php } ?>
                </tr>
                <tr style="font-size: 230%;">
                  <?php 
                  $jumlahset1=0;
                  $jumlahset2=0;
                  foreach ($data_st as $key) { 
                    if($key->set_no==1){
                      $jumlahset1=$jumlahset1+$key->stock;
                    }else{
                      $jumlahset2=$jumlahset2+$key->stock;
                    } ?>
                  <td style="border:2px solid white;"><?=$key->stock;?></td>
                  <?php } ?>
                </tr>
                <tr style="font-size: 210%;background-color: green">
                  <td colspan="<?=ceil($jumlah_zona/2);?>" style="border:2px solid white;"><?=$jumlahset2;?></td>
                  <td colspan="<?=$jumlah_zona-ceil($jumlah_zona/2);?>" style="border:2px solid white;"><?=$jumlahset1;?></td>        
                </tr>
                <tr>
                  <td colspan="<?=$jumlah_zona;?>" style="padding: 0px;">
                    <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse:collapse;">
                        <tr style="font-size: 120%;background-color:blue">
                          <td colspan="11" style="border:2px solid white;height:7%;">RM</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td colspan="2" style="width:25%;height: 4%;border:2px solid white;">D79L</td>
                          <td colspan="2" style="width:25%;border:2px solid white;">D26A</td>
                          <td colspan="4" style="border:2px solid white;">D26A</td>
                          <td colspan="3" style="border:2px solid white;">D79L</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td colspan="2" style="border:2px solid white;height: 4%;">RR1</td>
                          <td colspan="2" style="border:2px solid white;">RR1</td>
                          <td colspan="2" style="border:2px solid white;">FR</td>
                          <td colspan="2" style="border:2px solid white;">RR2</td>
                          <td colspan="2" style="border:2px solid white;">FR</td>
                          <td  style="border:2px solid white;">RR2</td>
                        </tr>
                        <tr style="font-size: 150%;">
                          <td style="border:2px solid white;height: 4%;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">LH</td>
                          <td style="border:2px solid white;">RH</td>
                          <td style="border:2px solid white;">R/L</td>
                        </tr>
                        
                       <tr style="font-size: 230%;">
                          <?php 
                            $D79L2LH=0;
                            $D79L2RH=0;
                            $D26A2LH=0;
                            $D26A2RH=0;
                            $D79L1LH=0;
                            $D79L1RH=0;
                            $D79L1RL=0;
                            $D26AFRONTLH=0;
                            $D26AFRONTRH=0;
                            $D26ARR2LH=0;
                            $D26ARR2RH=0;
                            foreach($data_rm as $val){
                              if($val->grade.$val->set_no.$val->side_label=='D79L2LH'){
                               $D79L2LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L2RH'){
                               $D79L2RH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D26A2LH'){
                               $D26A2LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D26A2RH'){
                               $D26A2RH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L1LH'){
                               $D79L1LH=$val->stock;
                              }
                              if($val->grade.$val->set_no.$val->side_label=='D79L1RH'){
                               $D79L1RH=$val->stock;
                              }
                              if($val->grade.$val->row_seat=='D79LREAR NO. 2'){
                               $D79L1RL=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AFRONTLH'){
                               $D26AFRONTLH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AFRONTRH'){
                               $D26AFRONTRH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AREAR NO. 2LH'){
                               $D26ARR2LH=$val->stock;
                              }
                              if($val->grade.$val->row_seat.$val->side_label=='D26AREAR NO. 2RH'){
                               $D26ARR2RH=$val->stock;
                              }
                            }
                            $RM2=$D79L2LH+$D79L2RH+$D26A2LH+$D26A2RH;
                            $RM1=$D79L1LH+$D79L1RH+$D79L1RL+$D26AFRONTLH+$D26AFRONTRH;
                            ?>
                          <td style="border:2px solid white;"><?=$D79L2LH;?></td>
                          <td style="border:2px solid white;"><?=$D79L2RH;?></td>
                          <td style="border:2px solid white;"><?=$D26A2LH;?></td>
                          <td style="border:2px solid white;"><?=$D26A2RH;?></td>
                          <td style="border:2px solid white;"><?=$D26AFRONTLH;?></td>
                          <td style="border:2px solid white;"><?=$D26AFRONTRH;?></td>
                          <td style="border:2px solid white;"><?=$D26ARR2LH;?></td>
                          <td style="border:2px solid white;"><?=$D26ARR2RH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1LH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1RH;?></td>
                          <td style="border:2px solid white;"><?=$D79L1RL;?></td>
                        </tr>
                        <tr style="font-size: 210%;background-color: green">
                          <td colspan="4" style="border:2px solid white;"><?=$RM2;?></td>
                          <td colspan="7" style="border:2px solid white;"><?=$RM1;?></td>        
                        </tr>
                      </table>
                  </td>
                </tr>
              </table>