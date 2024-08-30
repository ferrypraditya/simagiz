<?php
$filex=base_url('gambar/picking/'.$pos_picking.'.jpg?id='.time());
?>

<div class="modal-header">
    <h4 class="modal-title">Form Update View Box Picking</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table border="0" style="width: 100%; height: 100%; border-collapse: collapse; background-color: #efefef;">
        <tr>
            <td style="width: 60%; padding: 5px;text-align: center;" class="text-green" id="log">
                Please Move Position Box No for Update
            </td>
            <td style="padding: 5px;">
                <table border="0" style="width: 100%; height: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 100%; height: 12%; text-align: center; font-weight: bold;">
                            <table border="1" style="width: 100%; height: 100%; border-collapse: collapse;">
                                <tr>
                                    <td 
                                        style="width: 100%; height: 7%; text-align: center; font-size: 200%; font-weight: bold; background-color: black; color: white; padding: 5px; border: 1px solid #777;">
                                        PICKING <?=$pos_picking;?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="source"
                                        style="width: 100%;  text-align: center; font-weight: normal; background-color: #ccc; padding: 5px; border: 1px solid #777;">
                                        <table class=" target"
                                            style="width: 100%;height:100%;background:url('<?=$filex;?>');background-repeat: no-repeat;background-size:100% 100%">
                                            <?php for($i=1;$i<=15;$i++){?>
                                            <tr>
                                                <?php for($j=1;$j<=12;$j++){ 
                                              ?>
                                                <td id="<?='R'.$i.'C'.$j;?>"
                                                    style="height:30px;width:30px;border:1px solid orange;font-weight:bold;color:#000;opacity: 0.5;vertical-align:middle;cursor:pointer;text-align: center;"
                                                    title="klik to update" class="empty" class="col"
                                                    data-col="<?=$i.'-'.$j;?>" ondrop="drop(event)"
                                                    ondragover="allowDrop(event)">

                                                <?php if(!empty($qm)){
                                                     foreach($qm as $key){
                                                            if($key->row==$i and $key->col==$j){
                                                                echo "<div  class='item rounded-pill
                                                                bg-green text-bold' style='border:1px
                                                                solid #000'
                                                                draggable='true' data-item='".$key->box_no."' ondragstart='drag(event)' id='".$key->box_no."'
                                                                >".$key->box_no."
                                                                </div>";
                                                            }
                                                        }
                                                    }else{

                                                        for($x=$qb->min_box_no;$x<=$qb->max_box_no;$x++){
                                                            if($x==$i and $x==$j){
                                                                 echo "<div  class='item rounded-pill
                                                                bg-green text-bold' style='border:1px
                                                                solid #000'
                                                                draggable='true' data-item='".$x."' ondragstart='drag(event)' id='".$x."'
                                                                >".$x."
                                                                </div>";
                                                            }
                                                        }
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
var pos_picking = "<?=$pos_picking;?>";
var max = "<?=$qb->max_box_no;?>";

function mapping(row, col, box_no) {
    //console.log(row, col)
    $.ajax({
        url: '<?=base_url('master/submitkor?api='.$this->id_t); ?>',
        type: 'post',
        data: "pos_picking=" + pos_picking + "&max=" + max + "&col=" +
            col + "&row=" + row + "&box_no=" + box_no +
            "&<?=$this->security->get_csrf_token_name();?>=" + cv,
        dataType: 'json',
        success: function(response) {
            if (response.success == true) {
                $('.card-header').text('Update Success');
                $('.card-header').addClass('text-success text-bold');
                $('.form-group').removeClass('has-error')
                    .removeClass('has-success');
                $('.text-danger').remove();
                formupdateview('<?=$pos_picking;?>');
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