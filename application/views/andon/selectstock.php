<table id="example" class="display compact" style="width:100%;height:100%;border-spacing: 0px;border-collapse:collapse;">
  <thead>
      <tr style="background-color: #444;">
        <th style="border:1px solid #ccc;height: 25px">
          IDSEAT
        </th>
        <th style="border:1px solid #ccc;">
          CODE
        </th>
        <th style="border:1px solid #ccc;">
          ITEM
        </th>
        <th style="border:1px solid #ccc;">
          PARTNO
        </th>
        <th style="border:1px solid #ccc;">
          GRADE
        </th>
        <th style="border:1px solid #ccc;">
          MODEL
        </th>
        <th style="border:1px solid #ccc;">
          MIN
        </th>
        <th style="border:1px solid #ccc;">
          MAX
        </th>
        
        <th style="border:1px solid #ccc;">
          STOCK
        </th>
        <th style="border:1px solid #ccc;">
          P/H
        </th>
        <th style="border:1px solid #ccc;">
          STRENGTH
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data_seat as $key) { 
        if($key->status=='EMPTY'){
          $bg="background-color:red";
        }elseif($key->status=='CRITICAL'){
           $bg="background-color:yellow;color:black;";
        }elseif($key->status=='NORMAL'){
           $bg="background-color:green;";
        }elseif($key->status=='OVER'){
           $bg="background-color:blue;";
        }else{
            $bg="background-color:gray;";
        }
       ?>
      <tr style="<?=$bg;?>">
        <td style="border:1px solid #ccc;">
          <?=$key->idseat;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->code;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->item;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->part_no;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->grade;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->model;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->stock_min;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->stock_max;?>
        </td>
        
        <td style="border:1px solid #ccc;">
          <?=$key->stock;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=$key->prod_h;?>
        </td>
        <td style="border:1px solid #ccc;">
          <?=round($key->stock/$key->prod_h,2);?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script type="text/javascript">
var tinggi = ($(window).height()-340);
  if(tinggi<150){
    var tinggi=150;
  }
var page = 10;
if(tinggi>400){
  var page = 12;
}
$('#example').DataTable({
    "ordering": false,
    "pageLength" :page,
    "lengthMenu":[ [10,15,20, 25, 50, -1], [10,15,20, 25, 50, "All"] ],
    "scrollCollapse":true,
    "paging":true,
    "fixedColumns":false,
    "autoWidth": true,
    "lengthChange": true,
  });
</script>