<!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
    <section class="content-header"   style="padding-top:0px !important;padding-bottom:0px !important;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <span style="font-size: 26px;"> Welcome <?=$this->nama;?>&nbsp;</span>
            <span><i><?=gmdate('l, d F Y',time()+60*60*7);?>&nbsp;<span id="clock"><?=date('H:i:s');?></span></i></span>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="menu('<?=$url;?>','<?=$nav;?>','<?=$table;?>','<?=$menuid;?>')"><?=$nav;?></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




