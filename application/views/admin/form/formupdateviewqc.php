<?php
$filex=base_url('gambar/qc_center/'.$seat_part_no.'.jpg?id='.time());
?>

<div class="modal-header pt-0 pb-0">
    <h4 class="modal-title p-1">Form Update View QC Seat</h4>
    <button type="button pb-1" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body p-1">
    <table border="0" style="width: 100%; height: 100%; border-collapse: collapse; background-color: #efefef;">
        <tr>
            <td class="text-green p-1 text-center" id="log">
                Please Move Position Problem No for Update
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">
                <table border="0" style="width: 100%; height: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 100%; height: 12%; text-align: center; font-weight: bold;">
                            <table border="1" style="width: 100%; height: 100%; border-collapse: collapse;">
                                <tr>
                                    <td 
                                        style="width: 100%; height: 7%; text-align: center; font-size: 200%; font-weight: bold; background-color: black; color: white; padding: 5px; border: 1px solid #777;">
                                        PartNo Seat <?=$seat_part_no;?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="source"
                                        style="width: 100%;  text-align: center; font-weight: normal; background-color: #ccc; padding: 5px; border: 1px solid #777;">
                                        <table class=" target"
                                            style="width: 100%;height:100%;background:url('<?=$filex;?>');background-repeat: no-repeat;background-size:100% 100%">
                                            <?php for($i=1;$i<=10;$i++){?>
                                            <tr>
                                                <?php for($j=1;$j<=20;$j++){ 
                                              ?>
                                                <td id="<?='R'.$i.'C'.$j;?>"
                                                    style="height:50px;width:50px;border:1px solid orange;font-weight:bold;color:#000;opacity: 0.5;vertical-align:middle;cursor:pointer;text-align: center;"
                                                    title="klik to update" class="empty" class="col"
                                                    data-col="<?=$i.'-'.$j;?>" ondrop="drop(event)"
                                                    ondragover="allowDrop(event)">

                                                <?php if(!empty($qm)){
                                                        foreach($qm as $key){
                                                            if($key->row==$i and $key->col==$j){
                                                                echo "<div  class='item rounded-pill
                                                                bg-green text-xl text-bold' style='height:100%;width:100%;border:1px
                                                                solid #000'
                                                                draggable='true' data-item='".$key->problem_no.'|'.$key->id."' ondragstart='drag(event)' id='".$key->problem_no."'
                                                                >".$key->problem_no."
                                                                </div>";
                                                            }
                                                        }
                                                    }else{

                                                        for($x=$qb->min_problem_no;$x<=$qb->max_problem_no;$x++){
                                                            if($x==$i and $x==$j){
                                                                 echo "<div  class='item rounded-pill
                                                                bg-green text-xl text-bold' style='height:100%;width:100%;border:1px
                                                                solid #000'
                                                                draggable='true' data-item='".$x."|0' ondragstart='drag(event)' id='".$x."'
                                                                >".$x."
                                                                </div>";
                                                            }
                                                        }
                                                    } 
                                                    if($i==10 and $j==20) {
                                                        echo "<i class='fa fa-trash text-red text-xl'></i>";
                                                    }
                                                    ?>

                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
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
</div>

<script type=" text/javascript">
var cv = "<?=$this->security->get_csrf_hash();?>";
var seat_part_no = "<?=$seat_part_no;?>";
var max = "<?=$qb->max_problem_no;?>";

function mapping(row, col, problem_no) {
    //console.log(row, col)
    $.ajax({
        url: '<?=base_url('master/submitkorqc?api='.$this->id_t); ?>',
        type: 'post',
        data: "seat_part_no=" + seat_part_no + "&max=" + max + "&col=" +
            col + "&row=" + row + "&problem_no=" + problem_no +
            "&<?=$this->security->get_csrf_token_name();?>=" + cv,
        dataType: 'json',
        success: function(response) {
            if (response.success == true) {
                $('.card-header').text('Update Success');
                $('.card-header').addClass('text-success text-bold');
                $('.form-group').removeClass('has-error')
                    .removeClass('has-success');
                $('.text-danger').remove();
                formupdateviewqc('<?=$seat_part_no;?>');
                $('.card-header').addClass('text-success text-bold');

            } else {
                $.each(response.messages, function(key, value) {
                    var element = $('#' + key);
                    element.closest('div.form-group')
                        .removeClass('has-error')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                        .find('.text-danger')
                        .remove();
                    element.after(value);
                });
            }
        }
    });
}

let dataCol, dataItem;
let elLog = document.getElementById('log')

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("html", ev.target.id);
    dataItem = ev.currentTarget.getAttribute("data-item")
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("html");
    ev.target.appendChild(document.getElementById(data));
    dataCol = ev.currentTarget.getAttribute("data-col");
    let status = `Berhasil, Item ${dataItem} dipindah ke Row: ${dataCol.split("-")[0]} Col: ${dataCol.split("-")[1]}`
    elLog.innerHTML = status;
    mapping(dataCol.split("-")[0], dataCol.split("-")[1], dataItem)
}
</script>