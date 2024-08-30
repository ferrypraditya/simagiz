    <table   style=" width:100%; border-spacing:0px; margin:0px; border-collapse:collapse"> 
        <tr>
            <?php for($i=1; $i<=8; $i++){ ?>

            <td style="vertical-align:top">
                <table border="1" style="width:100%; border-spacing:0px; margin:0px; border-collapse:collapse">
                  
                    <tr>
                    <?php if($i==1){ ?>
                        <th rowspan="2" style="background-color:aqua; color:black; width:6%">LANE</th>
                    <?php } ?>
                        <th colspan="3" style="background-color:aqua; color:black; width:10%; font-size:20px">#<?=$i;?></th>
            
                    </tr>
                    <tr  style="background-color:aqua; color:black;">
                        <th>LIFT&nbsp;NO</th>
                        <th>SHOP</th>
                        <th>PLC</th>
                    </tr>
                    <?php foreach ($qqc as $key) 
                    {
                        $lifting_no=$key->lifting_no;
                        $shop='A'.$key->shop.' T'.$key->trip;
                        if($lifting_no==''){
                            $lifting_no='-';
                            $shop='-';
                        }
                        if($key->status=='OK'){
                            $bg="background-color:lime; color:black";
                        }else{
                            $bg="background-color:red; color:white";
                        }
                        if($key->line_no==$i){ ?> 
                    <tr>
                    
                   <?php if($i==1){ ?>
                        <th style="width:6%"><?=$key->pos_level;?></th>
                    <?php } ?>
                        <th><?=$lifting_no;?></th>
                        <th><?=$shop;?></th>
                        <th style="<?=$bg;?>"><?=$key->status;?></th>
                    
                    </tr>
                    <?php }}

                     foreach ($qplc as $key) 
                    {
                        $lifting_no=$key->lifting_no;
                        $shop='A'.$key->shop.' T'.$key->trip;
                        if($lifting_no==''){
                            $lifting_no='-';
                            $shop='-';
                        }
                        if($key->plc=='OK'){
                            $bg="background-color:lime; color:black";
                        }else{
                            $bg="background-color:red; color:white";
                        }
                        if($key->line==$i){ ?> 
                    <tr>
                    
                   <?php if($i==1){ ?>
                        <th style="width:6%"><?=$key->pos;?></th>
                    <?php } ?>
                        <th><?=$lifting_no;?></th>
                        <th><?=$shop;?></th>
                        <th style="<?=$bg;?>"><?=$key->plc;?></th>
                    
                    </tr>
                    <?php }} ?>
                    
                </table>
            </td>
        <?php } ?>
        </tr>
    </table>