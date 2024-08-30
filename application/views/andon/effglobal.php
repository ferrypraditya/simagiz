<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<style type="text/css">
  html,body { 
      height: 100%;
      width: 100%;
      padding:0px;
      margin:0px;
      font-family: sans-serif;
      background-color: #000;
      color: #fff;
      
    }
    @media (max-width: 899px) {
      .header{
        font-size: 7px;
      }
      .content{
        font-size: 8px;
      }
    }
    @media (min-width: 900px) {
      .header{
        font-size: 16px;
      }
      .content{
        font-size: 16px;
      }
    }
    .text-center{
      text-align: center;
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
    function displayServerTime(){
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
        $("#clock").text((sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss));
    }
    setInterval('displayServerTime()',500);
</script>
</head>
<body>
<table style="width: 100%;height: 100%;border-spacing:0px;padding: 0px;">
  <tr>
    <th>    
      <table style="background-color:#000;height: 100%;width: 100%;border-spacing:0px;border-collapse: separate;border:0px solid #000;border-radius: 0px;">
        <tr class="header" style="height: 4%;background-color:#000;color:yellow">
          <th rowspan="2" style="width:9%;border: 2px solid white;border-radius: 3px;">
            <img src="<?=base_url('assets/img/'.$logo);?>" style="width:100%;height:100px;vertical-align: middle;">
          </th>
          <th style="text-align: center;border: 2px solid white;border-radius: 3px;">
            <div style="font-size: 230%;font-weight: bold;text-shadow:2px 2px 3px #000;">ANDON EFFICIENCY PRODUCTION</div>
          </th>
          <th rowspan="2" style="width: 15%;font-size: 150%;border: 2px solid white;border-radius: 3px;">
            <?=strtoupper(gmdate('d-m-Y',time()+60*60*7));?><br>
            <span id="clock"><?=gmdate('H:i:s',time()+60*60*7);?></span>
          </th>
        </tr>
        <tr class="header" style="background-color: #000;color:yellow">
            <td style="height:4%;border: 2px solid white;">
            PT. FUJI SEAT INDONESIA - KIIC PLANT
            </td>
          </tr>
        <tr>
          <td colspan="3" style="border: 0px solid #fff;padding:0px;border-radius: 0px;" class="content">
            <!-- 1.bungkus -->
            <table style="width: 100%;height:100%;border-spacing:0px;border: 0px solid #fff;">
              <!-- bagi tinggi-->
              <tr>
                <td style="height: 50%;width: 50%">
                    <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;border:1px solid white">
        
                        <tr style="text-transform: uppercase;font-weight: bold;"  class="header">
                          <td style="width: 25%;border: 1px solid white;font-size:170%;height: 10%">
                            <div id="status1" class="status1">
                            OFF
                            </div>
                          </td>
                          <td class="status1" style="border: 1px solid white;font-size:170%;">
                           <a href="<?=base_url('andon/effline/1');?>" target="_self" class="status1" style="text-decoration: none;"> LINE #1 </a>
                          </td>
                          <td class="status1" style="border: 1px solid white;font-size:170%;">
                            REAR 1
                          </td>
                          <td class="status1" id="grade1" style="width:10%;border: 1px solid white;font-size:170%;">
                           D30N
                          </td>
                        </tr>
                        <tr class="content">
                          <td style="border: 1px solid white;">
                              <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;font-size:120%;font-weight: bold;">
                                <tr style="height: 11%;color: white">
                                  <td  style="border: 1px solid white;width: 50%">
                                    PLAN
                                  </td>
                                  <td style="border: 1px solid white;">
                                    TARGET
                                  </td>
                                </tr>
                                <tr style="height:11%;background-color: #f39f12;color:#000;font-size:130%">
                                  <td style="border: 1px solid white;">
                                    <span  id="planning1">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;">
                                    <span id="target1">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                </tr>
                                <tr style="height:10%;color: white">
                                  <td style="border: 1px solid white;">
                                    OK
                                  </td>
                                  <td id="okpersen1" style="border: 1px solid white;">
                                    0
                                  </td>
                                  
                                </tr>
                                <tr style="height:11%;color: white;font-size:130%">
                                  <td style="border: 1px solid white;background-color: #009900">
                                    <span id="ok1">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                </tr>
                                <tr style="height:11%;">
                                  <td style="border: 1px solid white;color: red">
                                    NG
                                  </td>
                                   <td id="ngpersen1" style="border: 1px solid white;color: white">
                                    0
                                  </td>
                                </tr>
                                <tr style="height:11%;font-size:130%">
                                  <td  style="border: 1px solid white;background-color: red;color: white">
                                    <span id="ng1">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;color: white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                 
                                </tr>
                                <tr style="color: white">
                                  <td colspan="2" style="border: 1px solid white;">
                                    EFFICIENCY (%)
                                  </td>
                                </tr>
                                <tr style="height: 25%">
                                  <td id="eff1" colspan="2" style="border: 1px solid white;font-size:170%;background-color:red;color:#fff">
                                    0
                                  </td>
                                </tr>
                              </table>
                          </td>
                          <td colspan="3" style="border: 1px solid white;color:#000">
                              <table style="width: 100%;height:100%;border-spacing: 0px;background-color: white;">
                                <tr>
                                  <td style="width: 30px;vertical-align: bottom;padding-bottom: 40px;">
                                    <div style="transform: rotate(-90deg); -ms-transform:rotate(-90deg); -webkit-transform:rotate(-90deg);width: 30px;font-weight: bold;font-size: 80%;">JUMLAH&nbsp;PRODUKSI&nbsp;OK&nbsp;&&nbsp;<span style="color:red">NG</span></div>
                                  </td>
                                  <td id="line1">
                                    
                                  </td>
                                </tr>
                              </table>  
                          </td>
                        </tr>
                      </table>
                </td>
                <td>
                      <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;border:1px solid yellow">
        
                        <tr style="text-transform: uppercase;font-weight: bold;"  class="header">
                          <td style="width: 25%;border: 1px solid white;font-size:170%;height: 10%">
                            <div id="status2" class="status2">
                            OFF
                            </div>
                          </td>
                          <td class="status2" style="border: 1px solid white;font-size:170%;">
                            <a href="<?=base_url('andon/effline/2');?>" target="_self" class="status2" style="text-decoration: none;"> LINE #2 </a>
                          </td>
                          <td class="status2" style="border: 1px solid white;font-size:170%;">
                            REAR 2
                          </td>
                          <td class="status2" id="grade2" style="width:10%;border: 1px solid white;font-size:170%;">
                           D30N
                          </td>
                        </tr>
                        <tr class="content">
                          <td style="border: 1px solid white;">
                              <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;font-size:120%;font-weight: bold;">
                                <tr style="height: 11%;color: white">
                                  <td  style="border: 1px solid white;width: 50%">
                                    PLAN
                                  </td>
                                  <td style="border: 1px solid white;">
                                    TARGET
                                  </td>
                                </tr>
                                <tr style="height:11%;background-color: #f39f12;color:#000;font-size:130%">
                                  <td style="border: 1px solid white;">
                                    <span  id="planning2">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;">
                                    <span id="target2">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                </tr>
                                <tr style="height:10%;color: white">
                                  <td style="border: 1px solid white;">
                                    OK
                                  </td>
                                  <td id="okpersen2" style="border: 1px solid white;">
                                    0
                                  </td>
                                  
                                </tr>
                                <tr style="height:11%;color: white;font-size:130%">
                                  <td style="border: 1px solid white;background-color: #009900">
                                    <span id="ok2">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                </tr>
                                <tr style="height:11%;">
                                  <td style="border: 1px solid white;color: red">
                                    NG
                                  </td>
                                   <td id="ngpersen2" style="border: 1px solid white;color: white">
                                    0
                                  </td>
                                </tr>
                                <tr style="height:11%;font-size:130%">
                                  <td  style="border: 1px solid white;background-color: red;color: white">
                                    <span id="ng2">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;color: white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                 
                                </tr>
                                <tr style="color: white">
                                  <td colspan="2" style="border: 1px solid white;">
                                    EFFICIENCY (%)
                                  </td>
                                </tr>
                                <tr style="height: 25%">
                                  <td id="eff2" colspan="2" style="border: 1px solid white;font-size:170%;background-color:red;color:#fff">
                                    0
                                  </td>
                                </tr>
                              </table>
                          </td>
                          <td colspan="3" style="border: 1px solid white;color:#000">
                              <table style="width: 100%;height:100%;border-spacing: 0px;background-color: white;">
                                <tr>
                                  <td style="width: 30px;vertical-align: bottom;padding-bottom: 40px;">
                                    <div style="transform: rotate(-90deg); -ms-transform:rotate(-90deg); -webkit-transform:rotate(-90deg);width: 30px;font-weight: bold;font-size: 80%;">JUMLAH&nbsp;PRODUKSI&nbsp;OK&nbsp;&&nbsp;<span style="color:red">NG</span></div>
                                  </td>
                                  <td id="line2">
                                    
                                  </td>
                                </tr>
                              </table>  
                          </td>
                        </tr>
                      </table>
                </td>
              </tr>
              <tr>
                <td>
                  <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;border:1px solid white">
        
                        <tr style="text-transform: uppercase;font-weight: bold;"  class="header">
                          <td style="width: 25%;border: 1px solid white;font-size:170%;height: 10%">
                            <div id="status3" class="status3">
                            OFF
                            </div>
                          </td>
                          <td class="status3" style="border: 1px solid white;font-size:170%;">
                            <a href="<?=base_url('andon/effline/3');?>" target="_self" class="status3" style="text-decoration: none;"> LINE #3 </a>
                          </td>
                          <td class="status3" style="border: 1px solid white;font-size:170%;">
                            FRONT 
                          </td>
                          <td class="status3" id="grade3" style="width:10%;border: 1px solid white;font-size:170%;">
                           D30N
                          </td>
                        </tr>
                        <tr class="content">
                          <td style="border: 1px solid white;">
                              <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;font-size:120%;font-weight: bold;">
                                <tr style="height: 11%;color: white">
                                  <td  style="border: 1px solid white;width: 50%">
                                    PLAN
                                  </td>
                                  <td style="border: 1px solid white;">
                                    TARGET
                                  </td>
                                </tr>
                                <tr style="height:11%;background-color: #f39f12;color:#000;font-size:130%">
                                  <td style="border: 1px solid white;">
                                    <span  id="planning3">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;">
                                    <span id="target3">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                </tr>
                                <tr style="height:10%;color: white">
                                  <td style="border: 1px solid white;">
                                    OK
                                  </td>
                                  <td id="okpersen3" style="border: 1px solid white;">
                                    0
                                  </td>
                                  
                                </tr>
                                <tr style="height:11%;color: white;font-size:130%">
                                  <td style="border: 1px solid white;background-color: #009900">
                                    <span id="ok3">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                </tr>
                                <tr style="height:11%;">
                                  <td style="border: 1px solid white;color: red">
                                    NG
                                  </td>
                                   <td id="ngpersen3" style="border: 1px solid white;color: white">
                                    0
                                  </td>
                                </tr>
                                <tr style="height:11%;font-size:130%">
                                  <td  style="border: 1px solid white;background-color: red;color: white">
                                    <span id="ng3">0</span> <span style="font-size: 12px;">pcs</span>
                                  </td>
                                  <td style="border: 1px solid white;color: white;background-color: #f39f12;">
                                    &nbsp;
                                  </td>
                                 
                                </tr>
                                <tr style="color: white">
                                  <td colspan="2" style="border: 1px solid white;">
                                    EFFICIENCY (%)
                                  </td>
                                </tr>
                                <tr style="height: 25%">
                                  <td id="eff3" colspan="2" style="border: 1px solid white;font-size:170%;background-color:red;color:#fff">
                                    0
                                  </td>
                                </tr>
                              </table>
                          </td>
                          <td colspan="3" style="border: 1px solid white;color:#000">
                              <table style="width: 100%;height:100%;border-spacing: 0px;background-color: white;">
                                <tr>
                                  <td style="width: 30px;vertical-align: bottom;padding-bottom: 40px;">
                                    <div style="transform: rotate(-90deg); -ms-transform:rotate(-90deg); -webkit-transform:rotate(-90deg);width: 30px;font-weight: bold;font-size: 80%;">JUMLAH&nbsp;PRODUKSI&nbsp;OK&nbsp;&&nbsp;<span style="color:red">NG</span></div>
                                  </td>
                                  <td id="line3">
                                    
                                  </td>
                                </tr>
                              </table>  
                          </td>
                        </tr>
                      </table>
                </td>
                <td id="update" style="font-size: 10px;">
                  <!-- andon stock-->
                    <table style="height:100%;width:100%;border-spacing: 1px;text-align: center;color: #fff;border: 2px solid white;">
                      <tr>
                        <?php foreach ($data_storage as $key) { 
                          if($key->base_pallet_set==1){ $bg="#009900"; $title="REAR NO.1";}else{ $bg="blue"; $title="FRONT & RR NO.2";} ?>
                        <td style="border:0px solid #fff;">
                            <table style="height:100%;width:100%;border-spacing: 0px;">
                              <tr style="background-color:<?=$bg;?>">
                                <td colspan="4" style="height:10%;border:1px solid #fff;vertical-align: middle;padding: 0px;">
                                  <a href="<?=base_url('andon/storage');?>" target="_self" style="color:#fff;text-decoration: none;">
                                    <label style="border-radius: 30px;background-color: black;padding: 5px;">
                                    &nbsp;<?=$key->zona;?>&nbsp;</label>
                                    <?=$title;?>
                                  </a>
                                </td>
                              </tr>
                              <tr style="background-color: <?=$bg;?>;padding: 0px;">
                                <td style="height:5%;width:5%;border:1px solid #fff;">
                                  #
                                </td>
                                <td style="border:1px solid #fff;">
                                  Model
                                </td>
                                <td style="width:20%;border:1px solid #fff;">
                                  Sfx
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4" style="border:0px solid #fff;vertical-align: top;padding: 0px;">
                                  <?php $i=1;  foreach ($data_stock as $value) { if($key->zona==$value->zona){  ?>
                                  <table style="height:5%;width:100%;border-spacing: 0px;">
                                     <tr>
                                      <td style="width:5%;border:1px solid #fff;">
                                        <?=$i;?>
                                      </td>
                                      <td style="border:1px solid #fff;">
                                       <?=substr($value->model,0,7);?>
                                      </td>
                                      <td style="width:20%;border:1px solid #fff;">
                                        <?=$value->suffix1;?>
                                      </td>
                                    </tr>
                                  </table>

                                <?php $i=$i+1; }} ?>
                                </td>
                              </tr>
                            </table>
                        </td>
                        <?php } ?>
                      </tr>
                    </table>
                  <!-- isi-->
                </td>
              </tr>
              <!-- bagi tinggi-->             
            </table>
            <!-- 1.bungkus -->

          </td>         
        </tr>
      </table>
    </th>
  </tr>  
  <tr style="height: 4%;">
    <td>
      <marquee style="font-size: 20px;vertical-align: middle;color:yellow"><i><?=$pesan_andon;?></i></marquee>
    </td>
  </tr>
</table>
<!-- BEGIN VENDOR JS-->
  <script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js?='.$this->encrypt->sha1(rand(1000,10000000)));?>"></script>
  <script src="<?=base_url('assets/lte/echart/echarts.js?='.$this->encrypt->sha1(rand(1000,10000000)));?>"></script>
  <script type="text/javascript">
    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: '../assets/lte/echart'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            'echarts/chart/scatter',
            'echarts/chart/pie'
        ],


        // Charts setup
        function (ec) {

            // Initialize chart
            // ------------------------------
            myChart1 = ec.init(document.getElementById('line1'));
            myChart2 = ec.init(document.getElementById('line2'));
            myChart3 = ec.init(document.getElementById('line3'));

            // Chart Options
            // ------------------------------
            var chartOptions1 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: [
                    <?php foreach($data_eff1 as $row){ $x=$row->prod_hour+1;?>
                    '<?=$prod_hour.'~'.$x;?>',
                    <?php }?>
                    ],
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff1 as $row){ ?>
                        '<?=round($row->ok);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff1 as $row){ ?>
                        '<?=round($row->ng);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:[
                        <?php foreach($data_eff1 as $row){ ?>
                        '<?=round(($row->ok+$row->ng)/$row->target,2)*100;?>',
                        <?php }?>
                        ],                     
                    }

                ]
            };
             var chartOptions2 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: [
                    <?php foreach($data_eff2 as $row){ $x=$row->prod_hour+1;?>
                    '<?=$prod_hour.'~'.$x;?>',
                    <?php }?>
                    ],
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff2 as $row){ ?>
                        '<?=round($row->ok);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff2 as $row){ ?>
                        '<?=round($row->ng);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:[
                        <?php foreach($data_eff2 as $row){ ?>
                        '<?=round(($row->ok+$row->ng)/$row->target,2)*100;?>',
                        <?php }?>
                        ],                     
                    }

                ]
            };
            var chartOptions3 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: [
                    <?php foreach($data_eff3 as $row){ $x=$row->prod_hour+1;?>
                    '<?=$prod_hour.'~'.$x;?>',
                    <?php }?>
                    ],
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff3 as $row){ ?>
                        '<?=round($row->ok);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:[
                        <?php foreach($data_eff3 as $row){ ?>
                        '<?=round($row->ng);?>',
                        <?php }?>
                      ]
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:[
                        <?php foreach($data_eff3 as $row){ ?>
                        '<?=round(($row->ok+$row->ng)/$row->target,2)*100;?>',
                        <?php }?>
                        ],                     
                    }

                ]
            };
            // Apply options
            // ------------------------------

            myChart1.setOption(chartOptions1);
            myChart2.setOption(chartOptions2);
            myChart3.setOption(chartOptions3);


            // Resize chart
            // ------------------------------

            $(function () {

                // Resize chart on menu width change and window resize
                $(window).on('resize', resize);
                $(".menu-toggle").on('click', resize);

                // Resize function
                function resize() {
                    setTimeout(function() {

                        // Resize chart
                        myChart1.resize();
                        myChart2.resize();
                        myChart3.resize();
                    }, 200);
                }
            });
        }
    );
function updateChart1(){
       $.ajax({
            async: true, 
            type: "POST",
            url: "<?=base_url('andon/dataeffhour');?>",
            dataType: 'json',
            data: "line_no="+1, 
            cache:false,
            success: function(data){
                var chartOptions1 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: data.dataprod_hour
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.dataok,
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.datang,
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:data.dataeffhour,                     
                    }

                ]
            };

            // Apply options
            // ------------------------------

            myChart1.setOption(chartOptions1);
                 
            }
        }) 
        

    }
    function updateChart2(){
       $.ajax({
            async: true, 
            type: "POST",
            url: "<?=base_url('andon/dataeffhour');?>",
            dataType: 'json',
            data: "line_no="+2, 
            cache:false,
            success: function(data){
                var chartOptions2 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: data.dataprod_hour
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.dataok,
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.datang,
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:data.dataeffhour,                     
                    }

                ]
            };

            // Apply options
            // ------------------------------

            myChart2.setOption(chartOptions2);
                 
            }
        }) 
        

    }
function updateChart3(){
       $.ajax({
            async: true, 
            type: "POST",
            url: "<?=base_url('andon/dataeffhour');?>",
            dataType: 'json',
            data: "line_no="+3, 
            cache:false,
            success: function(data){
                var chartOptions3 = {

                // Setup grid
                backgroundColor :['white'],
                grid: {
                    x: 50,
                    x2: 45,
                    y: 45,
                    y2: 35,
                    borderWidth:0,
                    borderColor:'#444',
                },
                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                     axisPointer:{
                          type: 'line',
                          lineStyle: {
                              color: '#444',
                              width: 2,
                              type: 'dashed'
                          },
                          crossStyle: {
                              color: '#1e90ff',
                              width: 1,
                              type: 'dashed'
                          },
                          shadowStyle: {
                              color: 'rgba(150,150,150,0.3)',
                              width: 'auto',
                              type: 'default'
                          }
                     }
                },

                // Add legend
                legend: {
                    data: ['EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#ff0033', '#0aff22', '#ff1133'],

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap : true,
                    axisTick: {onGap:true},
                    axisLine:{
                       lineStyle:
                          {
                          color: '#999',
                          width: 1,
                          type: 'solid'
                      }
                    },
                    splitLine: {show:false},
                    data: data.dataprod_hour
                              
                }],

                // Vertical axis
                yAxis : [
                    {
                        type : 'value',
                        name : 'TOTAL',
                        splitNumber: 5,                        
                        boundaryGap: [0.01, 0.01],
                        axisLabel : {
                            formatter: '{value} pcs'
                        },
                        min:0,
                        max:70,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                        axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }

                    },
                    {
                        type : 'value',
                        name : 'EFF',
                        scale:true,
                        splitNumber: 5,
                        axisLabel : {
                            formatter: '{value} %'
                        },
                        min:0,
                        max:110,
                        splitLine:{
                          lineStyle:{
                          color: '#9A9',
                          width: 1,
                          type: 'dashed'
                        }
                        },
                         axisLine:{
                        lineStyle:{
                          color: '#999',
                          width: 1,
                          type: 'solid'
                        }
                      }
                    }
                ],
                

                // Add series
                series : [
                    {
                        name:'OK',
                        type:'bar',                        
                        stack:'true',
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.dataok,
                    },
                    {
                        name:'NG',
                        type:'bar',                        
                        stack:'true',

                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,
                            label : {
                                show : true,
                                position : 'inside',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#fff',
                                }
                            },
                            barBorderColor :'#999',
                            barBorderWidth :1
                        }
                    },
                        data:data.datang,
                    },
                    {
                        name:'EFF',
                        type:'line',
                        yAxisIndex: 1,
                        symbolSize:5,                  
                        itemStyle: {
                        normal: {                   // 系列级个性化，横向渐变填充
                            borderRadius: 5,                         
                            label : {
                                show : true,
                                position : 'bottom',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#000',
                                }
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:data.dataeffhour,                     
                    }

                ]
            };

            // Apply options
            // ------------------------------

            myChart3.setOption(chartOptions3);
                 
            }
        }) 
        

    }
</script>

<script type="text/javascript">
$.ajaxSetup ({
    cache: false
});
$(document).ready(function() {
    doesConnectionExist();
       selesai();
     
});
function selesai() {
  setTimeout(function() {
    doesConnectionExist();
    selesai();
  }, 5000);
}

function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
    var file = "#";
    var randomNum = Math.round(Math.random() * 10000);
    var jumlah = "<?=$jumlah;?>";
    xhr.open('HEAD', file + "?nocache=" + randomNum, true);
    xhr.send();
    
    xhr.addEventListener("readystatechange", processRequest, false);

    function processRequest(e) {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 304) {
          $(document).ready(function(){
            
                updateChart1();
                updateChart2();
                updateChart3();
                $.ajax({
                    async: true,
                    type: "POST",
                    url :"<?=base_url("andon/resultglobal?=".$this->encrypt->sha1(rand(1000,10000000)));?>",
                    cache:false,
                    dataType: 'json',
                    data: "line_no="+1,                
                    success: function(data){ 
                          $('#shift').text(data.shift);
                        <?php foreach ($data_line as $ke) {?>
                                      
                            var target<?=$ke->line_no;?> = data.target<?=$ke->line_no;?>;
                            var eff<?=$ke->line_no;?> = data.eff<?=$ke->line_no;?>;
                            var status<?=$ke->line_no;?> = data.status<?=$ke->line_no;?>;
                            $('#planning<?=$ke->line_no;?>').text(data.planning<?=$ke->line_no;?>);
                            $('#target<?=$ke->line_no;?>').text(data.target<?=$ke->line_no;?>);
                            $('#ok<?=$ke->line_no;?>').text(data.ok<?=$ke->line_no;?>);
                            $('#ng<?=$ke->line_no;?>').text(data.ng<?=$ke->line_no;?>);
                            $('#okpersen<?=$ke->line_no;?>').text(data.okpersen<?=$ke->line_no;?>+' %');
                            $('#ngpersen<?=$ke->line_no;?>').text(data.ngpersen<?=$ke->line_no;?>+' %');
                            $('#takt_time<?=$ke->line_no;?>').text(data.takt_time<?=$ke->line_no;?>);
                            $('#eff<?=$ke->line_no;?>').text(data.eff<?=$ke->line_no;?>);
                            $('#status<?=$ke->line_no;?>').text(data.status<?=$ke->line_no;?>);
                            $('#grade<?=$ke->line_no;?>').text(data.grade<?=$ke->line_no;?>);
                            
                              if(eff<?=$ke->line_no;?>>95 && target<?=$ke->line_no;?>>0){
                                $('#eff<?=$ke->line_no;?>').css({"background-color": "green"});
                              }else if(eff<?=$ke->line_no;?>>=80 && eff<?=$ke->line_no;?><95 && target<?=$ke->line_no;?>>0){
                                $("#eff<?=$ke->line_no;?>").css({"background-color": "yellow"});
                              }else if(eff<?=$ke->line_no;?><80 && target<?=$ke->line_no;?>>0){
                                $("#eff<?=$ke->line_no;?>").css({"background-color": "red"});
                              }else{
                                $("#eff<?=$ke->line_no;?>").css({"background-color": "#000"});
                               }
                              if(status<?=$ke->line_no;?>=="OFF"){
                                $(".status<?=$ke->line_no;?>").css({"color": "white"});
                              }else if(status<?=$ke->line_no;?>=="REST TIME"){
                                $(".status<?=$ke->line_no;?>").css({"color": "blue"});
                              }else if(status<?=$ke->line_no;?>=="RUNNING"){
                                $(".status<?=$ke->line_no;?>").css({"color": "#0aff22"});
                              }else if(status<?=$ke->line_no;?>=="DELAY"){
                                $(".status<?=$ke->line_no;?>").css({"color": "red"});
                              }else{
                                $(".status<?=$ke->line_no;?>").css({"color": "red"});
                              }
                              if(status<?=$ke->line_no;?>=="DELAY"){
                                 $("#status<?=$ke->line_no;?>").addClass('kedip');
                              }else{
                                $("#status<?=$ke->line_no;?>").removeClass('kedip');
                                $("#status<?=$ke->line_no;?>").show();
                              }
                        <?php } ?>
                        if(data.jumlah>jumlah){
                          $('#update').load('<?=base_url('andon/view_storage1/'); ?>', 'f' + (Math.random()*1000000));
                        }
                    }
                });
            
           });
        } else {
            tempAlert("KONEKSI ERROR <br><br><br>Silakan Periksa Koneksi Jaringan / Network Anda !!",4000);
        }
      }
    }
}

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:15%;left:25%;background-color:yellow");
 el.innerHTML = msg;
 el.style.width = "670px";
el.style.height = "530px";
el.style.textAlign = "center";
el.style.fontSize = "50px";
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
 setInterval(function(){
     $(".kedip").toggle();
    },300);
 window.clearInterval();
</script>

<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, (5 * 60) * 1000);
</script>

</body>
</html>
