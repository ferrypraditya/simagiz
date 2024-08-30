    <table  border="1" style=" width:100%; border-spacing:0px; margin-left:auto; border-collapse:collapse;margin-right:auto">
        <tr style="height:30px; background-color:yellow; color:black">
            <th style="width:5%">NO</th>
            <th style="width:5%;">LINE</th>
            <th style="width:10%;">POS</th>
            <th style="width:10%">CODE</th>
            <th style="width:15%">CAP TINTA</th>
            <th style="width:15%;">CAP KERTAS</th>
            <th >REMAIN TINTA</th>
            <th >REMAIN KERTAS</th>

        </tr>
        <?php
        $id=1;

            foreach($qp as $key){
                if($key->cons_tinta<=10){
                    $bgt="background-color:red; color:white";
                }else{
                    $bgt="background-color:lime; color:white";
                }
                if($key->cons_kertas<=10){
                    $bgk="background-color:red; color:white";
                }else{
                    $bgk="background-color:lime; color:white";
                }
                ?>
            <tr>
            <td><?=$id++;?></td>
            <td><?=$key->line;?></td>
            <td><?=$key->pos;?></td>
            <td><?=$key->code;?></td>
            <td><?=$key->cap_tinta;?></td>
            <td><?=$key->cap_kertas;?></td>
            <td style="<?=$bgt;?>"><?=$key->cons_tinta;?></td>
            <td style="<?=$bgk;?>"><?=$key->cons_kertas;?></td>
            
            </tr> 
     <?php  } ?>
           
        </table>