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

$qs1=array_sort($qs1, 'id', SORT_DESC); 
$qs2=array_sort($qs2, 'id', SORT_DESC); 

$i=1; $ip1='-'; $wip1=0; $min1=0; $delv1='-'; $x=count($qs1); 
 foreach($qs1 as $key){ 
        if($i==1 and $key->scan==0){
           $ip1=$key->trip; 
        }
        if($key->scan==0){
           $wip1=$wip1+1; 
        }
        if($key->scan>0 and $key->lotid==$q1->lotid){ 
            $wip1=$wip1+1;
        }
        if($key->scan>0 and $key->lotid!=$q1->lotid){ 
            $min1=$min1+$key->remain;
        }
        if($key->lotid==$qd1->lotid){ 
            $min1=$min1+$key->remain;
        }
        if($key->lotid==$q1->lotid){
            $x=$i;
        }
        if($key->lotid==$qd1->lotid){
            $delv1=$key->trip;
        }
       
        $i++;
    }
$i=1; $ip2='-'; $wip2=0; $min2=0; $delv2='-'; $x=count($qs2); 
 foreach($qs2 as $key){ 
        if($i==1 and $key->scan==0){
           $ip2=$key->trip; 
        }
        if($key->scan==0){
           $wip2=$wip2+1; 
        }
        if($key->scan>0 and $key->lotid==$q2->lotid){ 
            $wip2=$wip2+1;
        }
        if($key->scan>0 and $key->lotid!=$q2->lotid){ 
            $min2=$min2+$key->remain;
        }
        if($key->lotid==$q2->lotid){
            $x=$i;
        }
        if($key->lotid==$qd2->lotid){
            $delv2=$key->trip;
        }
       
        $i++;
    }
foreach($qw1 as $key){
    if($key->wiptrip==$wip1){
        $wipstatus1=$key->status;
        $bgwip1=$key->color;
    }
}
foreach($qw2 as $key){
    if($key->wiptrip==$wip2){
        $wipstatus2=$key->status;
        $bgwip2=$key->color;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Andon | Delivery</title>
    <link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg');?>" type="image/x-icon" />
    <style type="text/css">
    * {
        font-family: "Microsoft Sans Serif", sans-serif !important;
    }

    html,
    body {
        height: 100%;
        width: 100%;
        padding: 0px;
        margin: 0px;
        font-family: sans-serif;
        background-color: #000;
        color: #fff;
        text-align: center;
        font-weight: bold;
        font-size: 12px;

    }

    @media (max-width: 899px) {
        .header {
            font-size: 10px;
        }

        .content {
            font-size: 8px;

        }
    }

    @media (min-width: 900px) {
        .header {
            font-size: 18px;
        }

        .content {
            font-size: 12px;

        }
    }

    div.dataTables_filter {
        text-align: right;
        margin-bottom: 2px;
        color: black;
    }

    table,
    tr,
    td {
        padding: 0px;
        border-collapse: collapse;
        border-spacing: 0px;

    }

    /* #example td {
        max-height: 25px;
    } */

    .link:hover {
        background-color: #300bbb !important;
        cursor: pointer;
        color: black;
    }

    .dataTables_scrollBody {
        overflow-x: auto !important;
        overflow-y: auto !important;
    }

    .text-left {
        text-align: left;
    }

    .text-green {
        color: green;
    }

    .text-red {
        color: red;
    }

    .dataTables_wrapper .dataTables_processing {
        position: absolute;
        text-align: center;
        font-size: 1.2em;
        background: white;
        opacity: 0.7;
        width: 200px;
        height: 15px;
        padding: 2px;
        margin: auto;
    }

    .dt-button {
        background-color: #555 !important;
        color: #fff !important;
    }

    .fg-button {
        /* background-color: #444 !important;
        color: #fff !important; */
        border-radius: 1px !important;
    }

    select,
    input {
        border-radius: 1px !important;
        height: 100%;
        padding: 3px;
    }

    .dataTables_length {
        height: 100%;
    }

    label {
        color: #ccc !important;
    }

    .dataTables_info {
        color: #ccc !important;
    }

    #example td {
        height: 25px;
        max-height: 25px;
    }

    #example.display.dataTable>tbody>tr.selected>*,
    #example.display.dataTable>tbody>tr.odd.selected>*,
    #example.display.dataTable>tbody>tr.selected:hover>* {
        box-shadow: inset 0 0 0 9999px #002FD8;
    }
    .bg-blue{
        color: white;
        background-color: blue;
    }
    .bg-red{
        color: white;
        background-color: red;
    }
    .bg-green{
        color: white;
        background-color: green;
    }
    .bg-yellow{
        color: black;
        background-color: yellow;
    }
    .bg-purple{
        color: white;
        background-color: purple;
    }
    .bg-black{
        color: white;
        background-color: black;
    }
    </style>

    <!-- Ionicons -->
    <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime() {
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        $("#clock").text((sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length ==
            1 ? "0" + ss : ss));
    }
    </script>
</head>

<body onLoad="setInterval('displayServerTime()',500);">
    <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;">
        <tr>
            <td style="padding:5px">
                <table border="1"
                    style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;border-color:#fff;border:#ccc">
                    <tr>
                        <td style="height: 10%;padding: 1px;" class="header">
                            <table border="1"
                                style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;">
                                <tr>
                                    <td style="height: 60px;width: 120px;background:url('<?=base_url('assets/img/logo.jpg');?>');background-repeat: no-repeat;background-size:98% 98%;background-position: center;cursor: pointer;"
                                        onclick="filter('','')">&nbsp;
                                    </td>
                                    <td style="font-size:170%; ">
                                        <h2 style="margin:0">ANDON DELIVERY</h2>
                                        <p style="margin:0; font-size: 0.5em;">PT. FUJI SEAT INDONESIA</p>
                                    </td>
                                    <td style="padding: 0px;;width: 7%;">
                                        <table
                                            style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;margin: 0px;">
                                            <td
                                                style="font-size: 90%; height:30px;width: 14%; background-color:#333; color:#fff; cursor: pointer;">
                                                LOCATION
                                            </td>
                                            <tr>
                                                <td style="padding: 0px; font-size: 110%;">
                                                    SAP
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding: 0px;width: 15%;">
                                        <table
                                            style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;margin: 0px;">
                                            <tr>
                                                <td
                                                    style="font-size: 90%; height:30px;width: 14%; background-color:#333; color:#fff; cursor: pointer;">
                                                    WORKING DATE
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="working_date" style="padding: 0px; font-size: 120%;">
                                                    <?=gmdate('Y-m-d',time()+60*60*7);?>&nbsp;<span id="clock"></span> </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding: 0px;width: 12%;">
                                        <table
                                            style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: collapse;margin: 0px;">
                                            <tr>
                                                <td
                                                    style="font-size: 90%; height:30px;width: 14%; background-color:#333; color:#fff; cursor: pointer;">
                                                    DISP. INTVL
                                                    <select onchange="handleInterval()" name="inputInterval"
                                                        id="inputInterval"
                                                        style="padding: 0 !important; height: 80%; border-radius: 2px;">
                                                        <option value="5">5s</option>
                                                        <option value="10">10s</option>
                                                        <option value="15">15s</option>
                                                        <option value="25" selected>25s</option>
                                                        <option value="60">60s</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px; font-size: 80%;">
                                                    <progress id="progress" class="progress" value="0"></progress>
                                                    <p id="progressVal" style="margin:0;"></p>
                                                       
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="content" id="refresh">
                           <table style="height:100%;width:100%;border-spacing:5px">
                            <tr>
                                <td style="width:50%;height:30%;padding:5px 2px 5px 5px">
                                     <table border="1" style="height:100%;width:100%;border-collapse: separate;border-color:#ccc">
                                        <tr>
                                            <td colspan="5" class="bg-purple" style="height:20%;font-size:200%;padding:5px">
                                                ASSY - 1
                                            </td>
                                        </tr>
                                        <tr style="font-size:150%">
                                            <td class="bg-blue" style="width:20%;height:20%;">
                                                INPUT TRIP
                                            </td>
                                            <td class="bg-green" style="width:20%">
                                                DELV.TRIP
                                            </td>
                                            <td class="bg-red" style="width:20%">
                                                MINUS(pcs)
                                            </td>
                                            <td class="bg-green" style="width:20%">
                                                SCAN TRIP
                                            </td>
                                            <td  class="<?=$bgwip1;?>">
                                                WIP TRIP
                                            </td>
                                        </tr>
                                        <tr style="font-size:350%">
                                            <td class="bg-blue">
                                                <?=$ip1;?>
                                            </td>
                                            <td class="bg-green">
                                                <?=$delv1;?>
                                            </td>
                                            <td class="bg-red">
                                               <?=$min1;?>
                                            </td>
                                            <td class="bg-green">
                                              <?=$q1->trip;?>
                                            </td>
                                            <td class="<?=$bgwip1;?>">
                                                <?=$wip1;?>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td colspan="5"  class="<?=$bgwip1;?>" style="height:20%;font-size:170%;padding:5px;">
                                                WIP TRIP <?=$wip1;?> STATUS <?=$wipstatus1;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height:20%;font-size:150%;font-weight: normal;">
                                                <table border="1" style="height:100%;width:100%;border-collapse: separate;border-color:#ccc">
                                                    <tr>
                                                        <td style="width:15%;background-color:gray;color: black;text-align: left;">
                                                            &nbsp;WIP TRIP
                                                        </td>
                                                        <?php foreach($qw1 as $key){ ?>
                                                        <td class="<?=$key->color;?>">
                                                            <?=$key->wiptrip;?>
                                                        </td>
                                                        <?php } ?>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color:gray;color: black;text-align: left;">
                                                            &nbsp;STATUS
                                                        </td>
                                                        <?php foreach($qw1 as $key){ ?>
                                                        <td class="<?=$key->color;?>">
                                                            <?=$key->status;?>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding:5px 5px 5px 3px">
                                    <table border="1" style="height:100%;width:100%;border-collapse: separate;border-color:#ccc">
                                        <tr>
                                            <td colspan="5" class="bg-purple" style="height:20%;font-size:200%;padding:5px">
                                                ASSY - 2
                                            </td>
                                        </tr>
                                        <tr style="font-size:150%">
                                            <td class="bg-blue" style="width:20%;height:20%;">
                                                INPUT TRIP
                                            </td>
                                            <td class="bg-green" style="width:20%">
                                                DELV.TRIP
                                            </td>
                                            <td class="bg-red" style="width:20%">
                                                MINUS(pcs)
                                            </td>
                                            <td class="bg-green" style="width:20%">
                                                SCAN TRIP
                                            </td>
                                            <td  class="<?=$bgwip2;?>">
                                                WIP TRIP
                                            </td>
                                        </tr>
                                        <tr style="font-size:350%">
                                            <td class="bg-blue">
                                                <?=$ip2;?>
                                            </td>
                                            <td class="bg-green">
                                                <?=$delv2;?>
                                            </td>
                                            <td class="bg-red">
                                               <?=$min2;?>
                                            </td>
                                            <td class="bg-green">
                                              <?=$q2->trip;?>
                                            </td>
                                            <td class="<?=$bgwip2;?>">
                                                <?=$wip2;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"  class="<?=$bgwip2;?>" style="height:20%;font-size:170%;padding:5px;">
                                                WIP TRIP <?=$wip2;?> STATUS <?=$wipstatus2;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height:20%;font-size:150%;font-weight: normal;">
                                                <table border="1" style="height:100%;width:100%;border-collapse: separate;border-color:#ccc">
                                                    <tr>
                                                        <td style="width:15%;background-color:gray;color: black;text-align: left;">
                                                            &nbsp;WIP TRIP
                                                        </td>
                                                        <?php foreach($qw2 as $key){ ?>
                                                        <td class="<?=$key->color;?>">
                                                            <?=$key->wiptrip;?>
                                                        </td>
                                                        <?php } ?>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color:gray;color: black;text-align: left;">
                                                            &nbsp;STATUS
                                                        </td>
                                                        <?php foreach($qw2 as $key){ ?>
                                                        <td class="<?=$key->color;?>">
                                                            <?=$key->status;?>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;padding:0px 2px 5px 5px">
                                    <table border="1" style="width:100%;height: 100%;border-color:#ccc">
                                        <tr style="font-size:150%">
                                            <td style="height:5%;width:20%">
                                                LOTID
                                            </td>
                                            <td>
                                                TRIP
                                            </td>
                                            <td>
                                                LIFTING
                                            </td>
                                            <td>
                                                SCANNED
                                            </td>
                                            <td>
                                                MINUS
                                            </td>
                                            <td>
                                                STATUS
                                            </td>
                                        </tr>
                                        <?php $i=1;  foreach($qs1 as $key){ 
                                               if($key->lotid==$q1->lotid){
                                                    $st='On Process';
                                                    $bg='bg-green'; 
                                                }elseif($key->scan>0 and $key->scan==$key->plan){ 
                                                    $st='Complete';
                                                    $bg='bg-black';
                                                 }elseif($key->scan==0 and $qd1->lotid!=$key->lotid ){ 
                                                    $st='Open';
                                                    $bg='bg-blue';
                                                }else{
                                                   $st='Minus'; 
                                                   $bg='bg-red';
                                                }
                                                ?>
                                        <tr style="font-size:150%;height: auto;" class="<?=$bg;?>">
                                             <td>
                                                <?=$key->lotid;?>
                                            </td>
                                            <td>
                                                <?=$key->trip;?>
                                            </td>
                                            <td>
                                                <?=$key->minlift.' - '.$key->maxlift;?>
                                            </td>
                                            <td>
                                                <?=$key->scan.'/'.$key->plan;?>
                                            </td>
                                            <td>
                                                 <?php if($key->scan>0 OR $qd1->lotid==$key->lotid){  echo $key->remain; }else{echo 0;} ?>
                                            </td>
                                            <td>
                                                <?=$st;?>
                                            </td>
                                        </tr>
                                    <?php $i++; } if($i<15){ for($x=$i;$x<=15;$x++){ ?>
                                         <tr style="font-size:150%;height: auto" class="bg-black">
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                        </tr>
                                        <?php } } ?>   
                                    </table>
                                </td>
                                <td style="vertical-align:top;padding:0px 5px 5px 2px">
                                    <table border="1" style="height: 100%;width:100%;border-color:#ccc">
                                        <tr style="font-size:150%">
                                             <td style="height:5%;width:20%">
                                                LOTID
                                            </td>
                                            <td>
                                                TRIP
                                            </td>
                                            <td>
                                                LIFTING
                                            </td>
                                            <td>
                                                SCANNED
                                            </td>
                                            <td>
                                                MINUS
                                            </td>
                                            <td>
                                                STATUS
                                            </td>
                                        </tr>
                                       <?php $i=1; foreach($qs2 as $key){ 
                                           if($key->lotid==$q2->lotid){
                                                    $st='On Process';
                                                    $bg='bg-green'; 
                                                }elseif($key->scan>0 and $key->scan==$key->plan){ 
                                                    $st='Complete';
                                                    $bg='bg-black';
                                                 }elseif($key->scan==0 and $qd2->lotid!=$key->lotid ){ 
                                                    $st='Open';
                                                    $bg='bg-blue';
                                                }else{
                                                   $st='Minus'; 
                                                   $bg='bg-red';
                                                }
                                                ?>
                                        <tr style="font-size:150%" class="<?=$bg;?>">
                                             <td>
                                                <?=$key->lotid;?>
                                            </td>
                                            <td>
                                                <?=$key->trip;?>
                                            </td>
                                            <td>
                                                <?=$key->minlift.' - '.$key->maxlift;?>
                                            </td>
                                            <td>
                                                <?=$key->scan.'/'.$key->plan;?>
                                            </td>
                                            <td>
                                                <?php if($key->scan>0 OR $qd2->lotid==$key->lotid){  echo $key->remain; }else{echo 0;} ?>
                                            </td>
                                            <td>
                                                <?=$st;?>
                                            </td>
                                        </tr>
                                   <?php $i++; } if($i<15){ for($x=$i;$x<=15;$x++){ ?>
                                         <tr style="font-size:150%;height: auto" class="bg-black">
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                        </tr>
                                        <?php } } ?>   
                                    </table>
                                </td>
                            </tr>
                           </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 3%;background-color: #111;color: yellow;border:none;vertical-align: middle;">
                            <marquee style="font-size:170%;vertical-align: middle;padding-top:3px;padding-bottom: 3px;">
                                <i><?=$qp->pesan;?></i>
                            </marquee>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js')?>"></script>
    <!-- DataTables -->
    <script type="text/javascript">
    $(document).ready(function() {
        handleInterval()
    });
    setTimeout(function() {
        location.reload();
    }, (10 * 60) * 1000);

    var count = 0;
    var progressBars = document.getElementById("progress");
    var progressVal = document.getElementById("progressVal");
    var tHnd = setInterval(function() {

        if (count >= interval) {
            location.reload();
            count = 0;
        }

        // console.log(count);

        progressBars.setAttribute("max", interval);
        progressBars.value = count;
        progressVal.innerHTML = count + '/' + interval + 's';
        count++;
    }, 1000);


    function handleInterval() {
        var inputInterval = document.getElementById('inputInterval').value;
        interval = inputInterval;
    }

    function dateNow() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        console.log(today);
        today = yyyy + '-' + mm + '-' + dd;
        return today;
    }

    
    </script>

</body>

</html>