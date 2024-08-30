
    <!-- Content Header (Page header) -->
    <section class="content-header"   style="padding-top:0px !important;padding-bottom:0px !important;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <span style="font-size: 26px;"> Welcome <?=$cu->nama;?>&nbsp;</span>
            <span><i><?=gmdate('l, d F Y',time()+60*60*7);?>&nbsp;<span id="clock"><?=date('H:i:s');?></span></i></span>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if($cu->user_group=='Admin'){ ?>
    <section class="content bg-light" style="background:url('<?=$bg;?>');background-repeat: no-repeat;background-size:100% 100%;padding-bottom: 0px;display: flex;justify-content: center;align-items: center;" id="bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
              <span class="nav-link brand-image img-circle elevation-5 bg-<?=$thema;?> p-5" style="width: 300px;margin: auto;">
                <h1><?=$title;?></h1>
                <?=$detail;?> 
              </span>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <?php }else{ ?>
      <section class="content bg-light">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Menu Home</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body text-center">
                  <?php foreach ($menu_child as $key) { ?>              
                  <a class="btn btn-app bg-<?=$thema;?> " onclick="menuUser('<?=base_url($key->url); ?>','<?=$key->nav;?>');" style="width:100px;">
                    <!--<span class="badge bg-success">&nbsp;</span>-->
                    <i class="fas <?=$key->icon;?>"></i>
                    <p><?=strtoupper($key->nav);?></p>
                  </a>
                  <?php } ?>

                </div>
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  <?php } ?>
 <script type="text/javascript">
  
  $(document).ready(function() {
    var tinggi = ($(window).height() - 137);
    if(tinggi<150){
      var tinggi=150;
    }
    $('#bg').css('height',tinggi);
  })
   $(window).resize(function(){
    var tinggi = ($(window).height() - 137);
    if(tinggi<150){
      var tinggi=150;
    }
    $('#bg').css('height',tinggi);
  })
 </script>        




