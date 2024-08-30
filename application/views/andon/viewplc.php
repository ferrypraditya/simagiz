    <table  border="1" style=" width:100%; border-spacing:0px; margin-left:auto; border-collapse:collapse;margin-right:auto">
        <tr style="height:30px; background-color:Aqua; color:black">
            <th style="width:4%">NO</th>
            <th style="width:18%">IP ADDRESS</th>
            <th style="width:10%">AREA</th>
            <th style="width:5%;">LINE</th>
            <th style="width:15%;">POS</th>
            <th >DESKRIPSI</th>
            <th >LIFTING</th>
            <th >STATUS</th>
            <th style="width:8%">PLC</th>

        </tr>
        <?php
        $id=1;
            foreach($qplc as $key)
            {
                if($key->plc=='OK'){
                    $bg="background-color:lime; color:white";
                }else{
                    $bg="background-color:red; color:white";
                }
                ?>
            <tr>
            <td><?=$id++;?></td>
            <td><?=$key->ip_address;?></td>
            <td><?=$key->area;?></td>
            <td><?=$key->line;?></td>
            <td><?=$key->pos;?></td>
            <td><?=$key->deskripsi;?></td>
            <td><?=$key->send2;?></td>
            <td><?=$key->status;?></td>
            <td style="<?=$bg;?>"> <?=$key->plc;?></td>
            
            
            </tr> 
     <?php  } 
            foreach($qqc as $key)
            {
                if($key->status=='OK'){
                    $bg="background-color:lime; color:white";
                }else{
                    $bg="background-color:red; color:white";
                }
                ?>
            <tr>
            <td><?=$id++;?></td>
            <td><?=$key->ip_no;?></td>
            <td><?=$key->user_level;?></td>
            <td><?=$key->line_no;?></td>
            <td><?=$key->pos_level;?></td>
            <td><?=$key->pos_level;?></td>
            <td><?=$key->lifting_no;?></td>
            <td><?=$key->location;?></td>
            <td style="<?=$bg;?>"> <?=$key->status;?></td>
            
            
            </tr> 
     <?php  } ?>
           
        </table>