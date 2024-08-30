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
      color: white;
      text-align: center;
      
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
        text-shadow:1px 1px 1px #000;
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

<table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;">
    <tr class="content">
      <td style="height: 4%;vertical-align: bottom;font-size:150%;text-align: right;padding-left: 5px;padding-right: 5px;">
        <?=gmdate('l, d F Y',time()+60*60*7);?> <span id="clock"></span>
      </td>
    </tr>
    <tr>
    <td style="padding-left: 5px;padding-right: 5px;">
      <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;border:1px solid white">
        <tr style="font-weight: bold;background-color: #444;font-size: 160%"  class="header">
          <td style="width: 25%;border: 1px solid white;height: 5%">
            STATUS
          </td>
          <td style="border: 1px solid white;">
            LINE #<?=$line_no;?>
          </td>
          <td style="border: 1px solid white;">
            SHIFT
          </td>
          <td style="width:10%;border: 1px solid white;">
           MODEL
          </td>
        </tr>
        <tr style="text-transform: uppercase;font-weight: bold;"  class="header">
          <td style="width: 25%;border: 1px solid white;font-size:300%;height: 5%">
            <div id="status" class="status">
            OFF
            </div>
          </td>
          <td class="status" style="border: 1px solid white;font-size:300%;">
            <?=$line_name;?>
          </td>
          <td class="status" style="border: 1px solid white;font-size:300%;">
            <label id="shift"></label>
          </td>
          <td class="status" id="model" style="width:10%;border: 1px solid white;font-size:300%;">
           N/A
          </td>
        </tr>
        <tr class="content">
          <td style="border: 1px solid white;width: 25%;color:white">
              <table style="width: 100%;height: 100%;border-spacing: 0px;border-collapse: separate;font-size:160%;font-weight: bold;">
                <tr style="height: 15%;font-size: 100%;background-color: #444;color:white">
                  <td  style="border: 1px solid white;width: 50%">
                    PLAN
                  </td>
                  <td style="border: 1px solid white;">
                    TARGET
                  </td>
                </tr>
                <tr style="font-size:250%;">
                  <td style="border: 1px solid white;">
                    <span  id="planning">0</span>
                  </td>
                  <td style="border: 1px solid white;">
                    <span id="target">0</span>
                  </td>
                </tr>
                 <tr style="height: 15%;color: white;font-size: 100%;background-color: #444;color:white">
                  <td style="border: 1px solid white;">
                    ACTUAL
                  </td>
                  <td style="border: 1px solid white;">
                    TAKT TIME
                  </td>
                </tr>
                <tr style="font-size:250%;">
                  <td id="actual" style="border: 1px solid white;">
                    0
                  </td>
                  <td id="takt_time" style="border: 1px solid white;">
                    0
                  </td>
                </tr>
              </table>
          </td>
          <td colspan="3" style="border: 1px solid white;color:#000">
              <table style="width: 100%;height:100%;border-spacing: 0px;background-color: white;">
                <tr>
                  <td style="width: 30px;vertical-align: bottom;padding-bottom: 15px;">
                    <div style="transform: rotate(-90deg); -ms-transform:rotate(-90deg); -webkit-transform:rotate(-90deg);width: 30px;font-weight: bold">JUMLAH&nbsp;PRODUKSI&nbsp;OK&nbsp;&&nbsp;<span style="color:red">NG</span></div>
                  </td>
                  <td id="column-line">
                    
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="border-top: 1px solid yellow;height: 25%" id="linestop">
                    <table style="width: 100%;height:100%;border-spacing: 0px;background-color: white;color:#000;font-size: 120%;font-weight: bold;">
                      <tr style="height: 25%">
                        <td style="border: 1px solid #444;width: 15%;">
                          TIME
                        </td>
                        <?php foreach($data_eff as $row){
                          $prod_hour=$row->prod_hour; 
                          $x=$prod_hour+1;
                          if($prod_hour<10){ $prod_hour='0'.$prod_hour;}
                          if($x<10){ $x='0'.$x;}
                          ?>
                        <td style="border: 1px solid #444;">
                         <?=$prod_hour.'~'.$x;?>
                        </td>
                        <?php }?>
                      </tr>
                       <tr style="height: 25%">
                        <td style="border: 1px solid #444;">
                          PLAN
                        </td>
                        <?php foreach($data_eff as $row){ $x=$row->prod_hour+1;?>
                        <td style="border: 1px solid #444;">
                         <?=$row->planning;?>
                        </td>
                        <?php }?>
                      </tr>
                      <tr style="height:25%">
                        <td style="border: 1px solid #444;">
                          ACTUAL
                        </td>
                        <?php foreach($data_eff as $row){ $x=$row->prod_hour+1;?>
                        <td  id="actual<?=$row->prod_hour;?>"  style="border: 1px solid #444;">
                          <?=$row->ok+$row->ng;?>
                        </td>
                        <?php }?>
                      </tr>
                      <tr>
                        <td style="border: 1px solid #444;">
                         LINE STOP
                        </td>
                        <?php foreach($data_eff as $row){ $x=$row->prod_hour+1;?>
                        <td id="int<?=$row->prod_hour;?>" style="border: 1px solid #444;">
                          &nbsp;
                        </td>
                        <?php }?>
                      </tr>
                    </table>
                  </td>
                </tr>
                
              </table>  
          </td>
        </tr>
        <tr>
          <td style="width: 25%;border: 1px solid white;height: 5%">
            <table style="width: 100%;height: 100%;border-spacing: 0px;background-color: black;color: white;font-size:160%;font-weight: bold;">
                <tr style="background-color: #444;color: white">
                  <td style="height: 15%;width: 25%;border: 1px solid white;">
                    EFFICIENCY (%)
                  </td>
                </tr>
                <tr>
                  <td rowspan="2" id="eff" style="font-size:450%;background-color:red;color:#fff;border: 1px solid white;">
                    0
                  </td>
                </tr>
              </table>
          </td>
          <td colspan="3" style="border: 1px solid white;">
                <table style="width: 100%;height: 100%;border-spacing: 0px;background-color: black;color: white;font-size:160%;font-weight: bold;border-collapse: collapse;">
                  <tr style="background-color: #444;color: white">
                    <td style="width: 15%;height: 15%;border: 1px solid white;">
                      SEAT
                    </td>
                    <td colspan="2" style="background-color: green;border: 1px solid white;">
                      CHOKORITSU
                    </td>
                    <td colspan="2" style="background-color: red;border: 1px solid white;">
                      NG
                    </td>
                  </tr>
                  <tr style="font-size: 200%">
                    <td style="border: 1px solid white;">
                      RH
                    </td>
                    <td  style="color: lime;font-weight: bold;border: 1px solid white;width: 20%;">
                      <span id="okrh">0</span>
                    </td>
                    <td id="okpersen" rowspan="2" style="font-size: 150%;color: lime;font-weight: bold;border: 1px solid white;">
                      0
                    </td>
                    <td style="color: red;font-weight: bold;border: 1px solid white;width: 20%;">
                      <span id="ngrh">0</span>
                    </td>
                    <td id="ngpersen" rowspan="2" style="font-size: 150%;color: red;font-weight: bold;border: 1px solid white;">
                      0
                    </td>
                  </tr>
                  <tr style="font-size: 200%">
                    <td style="border: 1px solid white;">
                      LH
                    </td>
                    <td  style="color: lime;font-weight: bold;border: 1px solid white;">
                     <span id="oklh">0</span>
                    </td>
                    <td style="color: red;font-weight: bold;border: 1px solid white;">
                      <span id="nglh">0</span>
                    </td>
                  </tr>
                </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr style="height: 4%;">
    <td style="padding:5px;">
      <marquee style="font-size: 26px;vertical-align: middle;color:red;font-weight: bold;"><i><?=$pesan_andon;?></i></marquee>
    </td>
  </tr>
</table>
 <!-- BEGIN VENDOR JS-->
  <script src="<?=base_url('assets/lte/jquery/jquery-2.1.3.min.js?id='.time());?>"></script>
  <script src="<?=base_url('assets/lte/echart/echarts.js?id='.time());?>"></script>
  <script type="text/javascript">
    cv = '<?=$this->security->get_csrf_hash(); ?>';
    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: '../../assets/lte/echart'
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
            myChart = ec.init(document.getElementById('column-line'));

            // Chart Options
            // ------------------------------
            var chartOptions = {

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
                    data: ['PLAN','EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#0073b7','#ff0033', '#0aff22', '#ff1133'],

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
                    <?php foreach($data_eff as $row){ 
                          $prod_hour=$row->prod_hour; 
                          $x=$prod_hour+1;
                          if($prod_hour<10){ $prod_hour='0'.$prod_hour;}
                          if($x<10){ $x='0'.$x;}
                          ?>
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
                        <?php foreach($data_eff as $row){ ?>
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
                        <?php foreach($data_eff as $row){ ?>
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
                                formatter: '{c} %',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#ff0033',
                                },
                            },
                            lineStyle:{
                              color: 'red',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:[
                        <?php foreach($data_eff as $row){ ?>
                        '<?=round(($row->ok+$row->ng)/$row->target,2)*100;?>',
                        <?php }?>
                        ],                     
                    },
                    {
                        name:'PLAN',
                        type:'line',
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
                              color: 'blue',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:[
                        <?php foreach($data_eff as $row){ ?>
                        '<?=$row->planning;?>',
                        <?php }?>
                        ],                     
                    }


                ]
            };

            // Apply options
            // ------------------------------

            myChart.setOption(chartOptions);


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
                        myChart.resize();
                    }, 200);
                }
            });
        }
    );
  function updateChart(){
       var line_no="<?=$line_no;?>";
       var test="test";
       $.ajax({
            async: true, 
            type: "POST",
            url: "<?=base_url('andon/dataeffhour?id='.time());?>",
            dataType: 'json',
            data: "line_no="+line_no+"&test="+test+"&<?=$this->security->get_csrf_token_name();?>="+cv,
            cache:false,
            success: function(data){
                var chartOptions = {

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
                    data: ['PLAN','EFF', 'OK','NG']
                },

                // Add custom colors
                color: ['#0073b7','#ff0033', '#0aff22', '#ff1133'],

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
                                formatter: '{c} %',
                                textStyle : {
                                    fontSize : '16',
                                    fontFamily : '微软雅黑',
                                    fontWeight : 'bold',
                                    color  : '#ff0033',
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
                    },
                    {
                        name:'PLAN',
                        type:'line',
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
                              color: 'blue',
                              width: 3,
                              type: 'solid'
                            }                    

                        }
                    },
                     
                        data:data.dataplanning,                     
                    }

                ]
            };

            // Apply options
            // ------------------------------

            myChart.setOption(chartOptions);
                 
            }
        }) 

    }


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
    var line_no = "<?=$line_no;?>";
    var eff_max = "<?=$ql->eff_max;?>";
    var eff_min = "<?=$ql->eff_min;?>";
    var takt_time = "<?=$takt_time;?>";         
    updateChart();
                       
    $.ajax({
          async: true,
          type: "POST",
          url :"<?=base_url('andon/resultline?='.time());?>",
          cache:false,
          dataType: 'json',
          data: "line_no="+line_no+"&takt_time="+takt_time+"&<?=$this->security->get_csrf_token_name();?>="+cv,                 
          success: function(data){ 
                                      
                  var target = data.target;
                  var eff = data.eff;
                  var status = data.status;
                  var bnc = data.bnc;
                  $('#planning').text(data.planning);
                  $('#target').text(data.target);
                  if(bnc>0){
                    $('#actual').text(data.actual+'+'+bnc);
                  }else{
                    $('#actual').text(data.actual);
                  }
                  $('#ok').text(data.ok);
                  $('#ng').text(data.ng);
                  $('#okrh').text(data.okrh);
                  $('#ngrh').text(data.ngrh);
                  $('#oklh').text(data.oklh);
                  $('#nglh').text(data.nglh);
                  $('#okpersen').text(data.okpersen+' %');
                  $('#ngpersen').text(data.ngpersen+' %');
                  $('#takt_time').text(data.takt_time);
                  $('#eff').text(data.eff);
                  $('#status').text(data.status);
                  $('#lifting_no').text(data.lifting_no);
                  $('#model').text(data.model);
                  $('#shift').text(data.shift);
                    if(eff>=eff_max && target>0){
                      $('#eff').css({"background-color":"green","color": "white"});
                    }else if(eff>=eff_min && eff<eff_max && target>0){
                      $("#eff").css({"background-color":"yellow","color": "black"});
                    }else if(eff<eff_min && target>0){
                      $("#eff").css({"background-color":"red","color": "white"});
                    }else{
                      $("#eff").css({"background-color":"black","color": "white"});
                     }
                    if(status=="OFF"){
                      $(".status").css({"color": "white"});
                    }else if(status=="REST TIME"){
                      $(".status").css({"color": "blue"});
                    }else if(status=="RUNNING"){
                      $(".status").css({"color": "#0aff22"});
                    }else if(status=="DELAY"){
                      $(".status").css({"color": "red"});
                    }else{
                      $(".status").css({"color": "red"});
                    }
                    if(status=="DELAY"){
                       $("#status").addClass('kedip');
                    }else{
                      $("#status").removeClass('kedip');
                      $("#status").show();
                    }
                    

                     <?php foreach($data_eff as $row){?>
                      $('#int<?=$row->prod_hour;?>').text(data.int<?=$row->prod_hour;?>);
                      $('#actual<?=$row->prod_hour;?>').text(data.actual<?=$row->prod_hour;?>);
                    <?php }?>
          }
      });
            
}
 setInterval(function(){
     $(".kedip").toggle();
    },300);
 window.clearInterval();
setTimeout(function () { 
  location.reload();
}, (5 * 60) * 1000);
</script>

</body>
</html>

