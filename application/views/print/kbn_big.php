<?php 
function array_sort($array, $on, $order=SORT_ASC){
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

$qs=array_sort($qs, 'id', SORT_DESC); 
?>
<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html,
      body {
        height: 100%;
        width: 100%;
        margin: 0px;
        padding: 0px;
        font-size: 12px;
        font-weight: bold;
      }
      table,tr,td{
        padding-left: 2px;
      }
      .courses {
          page-break-before: always;
      }

      .courses:first-child {
          page-break-before: avoid;
      }
    </style>
  </head>
  <body>
  <table class="courses" style="width: 100%;height:100%;padding: 0px;margin: 0px;font-family: sans-serif;border-spacing: 0px;">
    <tr>
      <td style="padding:3px">
          <table border="0" style="width: 100%;height:100%;padding: 0px;margin: 0px;border-spacing: 0px;text-align: left;border-color:#444;border-collapse: collapse;border-color: #999;border: 0mm solid #ccc;">
            <tr>
              <td style="font-size: 120%;width:40%;">
                Order Date : <?=$ql['create_date'];?>
              </td>
             <td rowspan="3" style="width:20%;text-align:center;padding: 0px;">
                <img
                      src="<?=base_url('assets/lte/mpdf60/qrcode/image.php?msg='.urlencode($qrcode).'&amp;err='.urlencode('Q'));?>"
                      style="width: 75px; height: 70px; text-align: center;"/>
              </td>
              <td rowspan="2" style="font-size: 200%;">
                <?=$qp->pos_name;?>
              </td>
            </tr>
            <tr>
              <td style="font-size:200%;">
                Assy Line #2 KAP
              </td>
            </tr>
            <tr>
              <td style="height: 5px;">
                List Lifting
              </td>
              <td style="font-size:75%">
                ID <?=$idprint;?>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="text-align:center;height: 75%;padding: 0px;">
                 <table border="1" style="width: 100%;height:100%;padding: 0px;margin: 0px;border-spacing: 0px;text-align: center;border-color:#444;border-collapse: collapse;border-color: #999;border: 0px solid #ccc;">
                  <tr>
                    <td>
                      Lifting
                    </td>
                    <td>
                      Model
                    </td>
                    <td>
                      Grade
                    </td>
                    <td>
                      Sfx
                    </td>
                    <td>
                      Variant
                    </td>
                  </tr>
                  <?php foreach($qs as $key){ ?>
                  <tr>
                    <td style="font-size:150%">
                      <?=$key->lifting_no;?>
                    </td>
                    <td style="font-size:150%">
                      <?=$key->model;?>
                    </td>
                    <td style="font-size:120%">
                      <?=$key->grade;?>
                    </td>
                    <td style="font-size:150%">
                      <?=$key->suffix;?>
                    </td>
                    <td style="text-align:left">
                      <?="<div style='padding:5px'>1. ".$key->variant1."</div><div style='padding:5px'>2. ".$key->variant2."</div>";?>
                    </td>
                  </tr>
                <?php } ?>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  <script type="text/javascript">
   window.print();
   var p = "<?=$print;?>";
   if(p=='Lx' || p=='Rx'){
    setTimeout(function() { 
        window.close();
    }, 100);
   }
   
</script>
  </body>
</html>
