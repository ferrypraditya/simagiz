<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    html,body { 
      height: 100%;
      width: 100%;
      margin: 0px;  
      padding: 0px;
    }
  .config .title{
    text-align:left;
  }
  </style>
</head>
<body>
<?php foreach ($cseat as $key) { $qr_airbag=$key->qr_airbag; ?> 
<table style="width: 100%;height:100%;padding: 0px;border-spacing: 0px;">
<?php for($h=1;$h<=3;$h++){ ?>
<tr>
        <td>
       <table style="width:100%;height:100%;padding:0px;font-family: sans-serif;border-spacing:0px;border-color:black;border:0px solid #000;">
         <tr>
          <td>
          <div class="tempatbarcode" style="width:55px;"></div>
          </td>
         </tr>
       </table>
    </td>
  </tr>
  <tr>
    <td>

    </td>
</tr>
<?php }  ?>
</table> 
<?php }  ?>
<script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js?='.$this->encrypt->sha1(rand(1000,10000000)));?>"></script>
<script src="<?=base_url('assets/lte/jquery/jquery-barcode.min.js?='.$this->encrypt->sha1(rand(1000,10000000)));?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".tempatbarcode").barcode("*<?=$qr_airbag;?>*", "code128",{barHeight:25,barWidth:1,fontSize:8});  
  });
   window.print();

</script>

</body>
</html>
