<?php
require_once('assets/lte/mpdf60/qrcode/qrcode.class.php');
?>
<!DOCTYPE html PUBLIC>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Delivery Note</title>
</head>

<body>
  <table style="width:100%;height:100%; border-spacing:0px;">
    <tr>
      <td align="center" style="padding-left:50px; padding-right:50px; padding-top:40px; padding-bottom:30px">
        <table border="0" cellspacing="0" style="width: 100%;height:100%;font-family: Arial;font-size:10px;">
          <tr valign="top" height="0%">
            <td>
              <table style="width: 100%;height:100%;">
                <!-- <tr valign="top"> -->
                <td width="50%">
                  <div style=" text-align:left;font-size:20px; font-weight:bold; margin-bottom: 0.3rem;">SLIP ORDER JBK - SEAT</div>
                  <div style=" text-align:left;font-size:16px; ">
                    (Delivery Note)
                  </div>
                </td>

                <td width="50%" style=" text-align:right; ">
                  <div style=" text-align:right;font-size:12px; font-weight:bold;">PT. FUJI SEAT INDONESIA</div>
                  <div style=" text-align:right;font-size:10px; ">
                    SUNTER PLANT<br>
                    Jl.Agung perkasa blok 9 k1 no 9, 15, Sunter Agung<br>
                    Kawasan Industri Sunter - Jakarta Utara<br>
                    14230 Jakarta - Indonesia<br>
                    Telp. &nbsp;: (021) 6530 2228
                    Fax. &nbsp; : (021) 6530 2228<br>
                  </div>
                </td>
                <!-- </tr> -->
              </table>
              <!-- <hr> -->
            </td>
          </tr>
          <tr height="8%" valign="top">
            <td>
              <table border="0" cellspacing="0" style="width: 100%;height:100%;font-family: Arial;font-size:12px;">
                <tr>
                  <td>
                    <table style="width: 100%;height:100%;font-family: Arial;font-size:12px;">
                      <tr>
                        <td>
                          Order Form
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          [ADM4] PBS ASSY <?= $qt->shop; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          To
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          FUJI SEAT INDONESIA
                        </td>
                      </tr>
                      <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                      </tr>
                      <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <table style="text-align:justify; width: 100%;height:100%;font-family: Arial;font-size:12px;">
                      <tr>
                        <td>
                          Tanggal Order
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          <?php echo date('d-m-Y', strtotime($qt->prod_date)); ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Jam Order
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          <?php if($qt->calc_time){
                            echo date('H:i:s', strtotime($qt->calc_time));
                           }else{
                            echo gmdate('H:i:s', time() + 60 * 60 * 7);
                           } ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          No Order
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          <?= $qt->sliporder; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                  <td align="center" valign="middle"><img src="<?= base_url('assets/lte/mpdf60/qrcode/image.php?msg=' . urlencode($qt->lotid) . '&amp;err=' . urlencode('Q')); ?>" style="width: 75px;height: 75px;"></td>

            </td>
          </tr>
        </table>
      </td>
    </tr>
    <!-- <tr height="2%">
            <td style="font-family: Arial;font-size:12px;font-weight: bold;">ORDER NO. : <?= $seqmin . " TO " . $seqmax; ?></td>
          </tr> -->
    <tr valign="top">
      <td style="height:40%;">
        <table border="0" style="width: 100%; height:100%; font-family: Arial;font-size:12px; border:medium;border-bottom:1px solid #000; border-spacing:0px;">
          <tr align="center" style="font-family: Arial;font-size:10px; font-weight:bold;">
            <td style="height:5%; border:1px solid #000" width="2%">NO</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000; width:5%;">LIFT NO</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">KATAKASHI</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">SUFFIX</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">COLOR</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">FR SEAT RH</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">FR SEAT LH</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">RR SEAT NO. 1 RH</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">RR SEAT NO. 1 LH</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">KODE SETTING</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">RR SEAT NO. 2 RH</td>
            <td style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000" width="8%">RR SEAT NO. 2 LH</td>
          </tr>
          <?php $i = 1;
          foreach ($data_table as $key) { ?>
            <tr>
              <td style="text-align: center;border-right:1px solid #000;border-left:1px solid #000; height:5%;">
                <?= $i++; ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000; height:5%;">
                <?= $key->lifting_no; ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">&nbsp;

              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?= $key->suffix; ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">&nbsp;

              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->frrh) {
                  echo $key->frrh;
                } else {
                  echo '-';
                } ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->frlh) {
                  echo $key->frlh;
                } else {
                  echo '-';
                } ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->r1rh) {
                  echo $key->r1rh;
                } else {
                  echo '-';
                } ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->r1lh) {
                  echo $key->r1lh;
                } else {
                  echo '-';
                } ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">&nbsp;

              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->r2rh) {
                  echo $key->r2rh;
                } else {
                  echo '-';
                } ?>
              </td>
              <td style="text-align: center;border-right:1px solid #000;">
                <?php if ($key->r2lh) {
                  echo $key->r2lh;
                } else {
                  echo '-';
                } ?>
              </td>
            </tr>
          <?php
          } ?>



        </table>

      </td>
    </tr>
    <tr height="1%">
      <td>&nbsp;</td>
    </tr>
    <tr height="15%">
      <td>
        <table style="width: 100%;height:100%;font-family: Arial;font-size:10px;">
          <tr>
            <td width="35%">Distribusi Fuji Seat Indonesia</td>
            <td width="30%">FUJI SEAT INDONESIA - DEPO</td>
            <td></td>
            <td width="20%"></td>
            <td width="40%">Logistik ADM P4</td>
          </tr>
          <tr>
            <td></td>
            <td>Approval</td>
            <td>Driver Truck</td>
            <td></td>
            <td>Receiving</td>
          </tr>
          <tr height="80%" valign="bottom">
            <td>&nbsp;</td>
            <td></td>
          </tr>
          <tr>
            <td width="30%"></td>
            <td>.....................</td>
            <td>.....................</td>
            <td></td>
            <td>.....................</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  </td>
  </tr>
  </table>
  <script type="text/javascript">
    window.print();
    setTimeout(function() {
      window.close();
    }, 1000);
  </script>
</body>

</html>