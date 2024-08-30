<table style="width: 100%;height: 100%;">
<?php $i=1; foreach ($data_problem as $row){  $j=$i % 3;
    if($j==1){ echo"<tr><td style='padding:5px;'>"; }else{ echo"<td style='padding:5px;'>";} ?>
    <table style="width: 100%;height: 100%;border-spacing: 10px;font-size: 40px;border:1px solid #000">
      <tr>
        <td onclick="checkproblem('<?=$row->problem_no;?>')" class="btn btn-danger btn-block" style="font-size: 30px;">
          <?=$row->problem_no;?>
        </td>
      </tr>
    </table>
<?php  if($j==0){ echo"</td></tr>"; }else{ echo"</td>";} $i=$i+1; } ?>
</table>
<script type="text/javascript">
  var part_no="<?=$part_no;?>";
  var mapping_no="<?=$mapping_no;?>";
  var grade="<?=$grade;?>";

function checkproblem(problem_no){  
  $.ajax({
        type: "POST",
        url : "<?=base_url('mapping/setadd?api='.$id_t); ?>",
         data:"part_no="+part_no+"&problem_no="+problem_no+"&mapping_no="+mapping_no+"&grade="+grade+"&<?=$this->security->get_csrf_token_name(); ?>="+cv,
        cache:false,
        success: function(data){
            $("#myModal").modal('hide');
            $("#set"+mapping_no).css({"background-color": "red"});          
            $("#"+mapping_no).text(problem_no); 
          }
      });
}
</script> 
