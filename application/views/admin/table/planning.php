     <?php
        $hour= intval(gmdate('H',time()+60*60*7));
        $menit= intval(gmdate('i',time()+60*60*7));
        $cek=($hour*60)+$menit;
        if($cek>=440 AND $cek<1260){ 
            $this->prod_shift="Day";
            $this->prod_shift1="Night";
            $this->prod_date=gmdate('Y-m-d',time()+60*60*7);
        }else{
          $this->prod_shift="Night";
          $this->prod_shift1="Day";
          $this->prod_date = gmdate('Y-m-d',time()+60*60*7);
          if($cek<440){
            $this->prod_date=date('Y-m-d',strtotime('-1 days',strtotime($this->prod_date)));
          }          
        }
    ?>
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-2">
                <table id="example" class="table table-hover table-bordered compact text-xs" style="width:100%;">
                    <thead>
                        <tr>
                            <th></th>
                             <?php foreach($data_field as $row){ 
                                echo "<th>".strtoupper($row->name)."</th>";
                              } ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th></th>
                            <?php foreach($data_field as $row){ 
                                echo "<th>".strtoupper($row->name)."</th>";
                              } ?>
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="myModal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" id="view">
                  
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="myModalsmall" data-toggle="modal" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog">
                <div class="modal-content" id="viewsmall">
                  
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="myModal1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" id="view1">
                  
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.content -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<script type="text/javascript" language="javascript" class="init"> 
 var editor;
 var tinggi = ($(window).height() - 445);
  if(parseInt(tinggi)<150){
    var tinggi=150;
  }
$(window).resize(function(){
    var tinggi = ($(window).height()-445);
    if(parseInt(tinggi)<150){
      var tinggi=150;
    }
    if (parseInt($('#example').css('height')) < tinggi) {
            $('.dataTables_scrollBody').css('height', tinggi);
            $('.dataTables_scrollBody').css('max-height', tinggi);
        }
  })   
function selectColumns ( editor, csv, header ) {
  var selectEditor = new $.fn.dataTable.Editor();
  var fields = editor.order();
  var tbl = "<?=$table;?>";

 for ( var i=1 ; i<fields.length ; i++ ) {
    var field = editor.field( fields[i] );

   if(tbl=='data_ajs'){
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time' && field.name()!='input_time' && field.name()!='input_by' && field.name()!='calc_time' && field.name()!='file_name'){
          selectEditor.add( {
            label: field.label(),
            name: field.name(),
            className:'p-0 m-0 text-sm',
            type: 'select',
            options: header,
            def: header[i]
            } );

        }
    } else if (tbl=='data_special'){
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time' && field.name()!='input_time' && field.name()!='input_by' && field.name()!='prod_id' && field.name()!='lifting_no'){
            selectEditor.add( {
            label: field.label(),
            name: field.name(),
            className:'p-0 m-0 text-sm',
            type: 'select',
            options: header,
            def: header[i]
            } );

        }
    }else{
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time'){
            selectEditor.add( {
            label: field.label(),
            name: field.name(),
            className:'p-0 m-0 text-sm',
            type: 'select',
            options: header,
            def: header[i]
            } );

        }
    }
      

  }

  selectEditor.create({
    title: 'Map CSV fields',
    buttons: 'Import '+csv.length+' records',
    message: 'Select the CSV column you want to use the data from for each field.',
    onComplete: 'none'
  });

  selectEditor.on('submitComplete', function (e, json, data, action) {
    // Use the host Editor instance to show a multi-row create form allowing the user to submit the data.
    editor.create( csv.length, {
      title: 'Confirm import',
      buttons: 'Submit',
      message: 'Click the <i>Submit</i> button to confirm the import of '+csv.length+' rows of data. Optionally, override the value for a field to set a common value by clicking on the field below.'
    } );

    for ( var i=1 ; i<fields.length ; i++ ) {
      var field = editor.field( fields[i] );
      var mapped = data[ field.name() ];
      if(tbl=='data_ajs'){
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time' && field.name()!='input_time' && field.name()!='input_by' && field.name()!='calc_time' && field.name()!='file_name'){
          for ( var j=0 ; j<csv.length ; j++ ) {
            field.multiSet( j, csv[j][mapped].trim())
          }
        }
      } else if (tbl=='data_special'){
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time' && field.name()!='input_time' && field.name()!='input_by' && field.name()!='prod_id' && field.name()!='lifting_no'){
          for ( var j=0 ; j<csv.length ; j++ ) {
            field.multiSet( j, csv[j][mapped].trim())
          }
        }
      }else{ 
        if(field.name()!='id' && field.name()!='update_by' && field.name()!='update_time'){
          for ( var j=0 ; j<csv.length ; j++ ) {
            field.multiSet( j, csv[j][mapped].trim())
          }
        }
    } 
    }

  } );
}
var uploadEditor = new $.fn.dataTable.Editor( {
fields: [ {
  label: 'CSV file:',
  name: 'csv',
  type: 'upload',
  ajax: function ( files ) {
    // Ajax override of the upload so we can handle the file locally. Here we use Papa
    // to parse the CSV.
    Papa.parse(files[0], {
      header: true,
      delimiter: ';',
      skipEmptyLines: true,
      complete: function (results) {
        if ( results.errors.length ) {
          console.log( results );
          uploadEditor.field('csv').error( 'CSV parsing error: '+ results.errors[0].message );
        }
        else {
            <?php if($table=='data_ajs'){ ?>
                selectColumns( formajscsv, results.data, results.meta.fields );
            <?php } else { ?>
                selectColumns( editor, results.data, results.meta.fields );
            <?php } ?>
        }
      }
    });
  }
} ]
} );
    // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        if(title!=''){
            $(this).html( '<input type="text" placeholder="Search" class="form-control input-sm" style="height: 2 5px !important;"/>' );
        }
        
      });
    formajscsv = new $.fn.dataTable.Editor({
        ajax: {
            url: "<?= base_url('Ajax/pldata?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
            type: "POST",
            data: function(d) {
                d.csrf_sysx_name = cv;
            }

        },
        table: "#example",
        fields: [
            {
                label: "id:",
                name: "id",
                type: "hidden"
            },
            {
            
                label: "sliporder:".toUpperCase(),
                name: "sliporder",
                className:"p-0 m-0 text-sm",
            },
            {
            
                label: "lifting_no:".toUpperCase(),
                name: "lifting_no",
                className:"p-0 m-0 text-sm",
            },
            {
            
                label: "model:".toUpperCase(),
                name: "model",
                className:"p-0 m-0 text-sm",
            },
            {
                label: "suffix:".toUpperCase(),
                name: "suffix",
                className:"p-0 m-0 text-sm",
            },
            {
                label: "vin:".toUpperCase(),
                name: "vin",
                className:"p-0 m-0 text-sm",
            },
            {
              label: "shop:".toUpperCase(),
              name: "shop",
              className:"p-0 m-0 text-sm",
              type: "select",
              options: [
                  { label: "2",value: "2" },
                  { label: "1",value: "1" },
                 
              ]
            },
            {
            
                label: "prod_date:".toUpperCase(),
                name: "prod_date",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                format: 'YYYY-MM-DD',
            },
            {
            
                label: "IMPORT:",
                name: "import",
                type:'hidden',
            },

        ]
    });
    
    formajs = new $.fn.dataTable.Editor({
        ajax: {
            url: "<?= base_url('Ajax/pldata?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
            type: "POST",
            data: function(d) {
                d.csrf_sysx_name = cv;
            }

        },
        table: "#example",
        fields: [
            {
                label: "id:",
                name: "id",
                type: "hidden"
            },           
            {
            
                label: "sliporder:".toUpperCase(),
                name: "sliporder",
                className:"p-0 m-0 text-sm",
            },
            {
            
                label: "lifting_no:".toUpperCase(),
                name: "lifting_no",
                className:"p-0 m-0 text-sm",
            },
            {
            
                label: "model:".toUpperCase(),
                name: "model",
                className:"p-0 m-0 text-sm",
            },
            {
                label: "suffix:".toUpperCase(),
                name: "suffix",
                className:"p-0 m-0 text-sm",
            },
            {
                label: "vin:".toUpperCase(),
                name: "vin",
                className:"p-0 m-0 text-sm",
            },
            {
              label: "shop:".toUpperCase(),
              name: "shop",
              className:"p-0 m-0 text-sm",
              type: "select",
              options: [
                  { label: "2",value: "2" },
                  { label: "1",value: "1" },
                 
              ]
            },
            {
            
                label: "prod_date:".toUpperCase(),
                name: "prod_date",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                def:   function () { return new Date('<?=$this->prod_date;?>'); },
                format: 'YYYY-MM-DD',
            },
            {
            
                label: "IMPORT:",
                name: "import",
                type:'hidden',
            },

        ]
    });
    editor = new $.fn.dataTable.Editor({ 
        ajax: {
            url: "<?=base_url('Ajax/plData?table='.$table.'&api='.$this->id_t.'&menuid='.$menuid);?>",
            type: "POST",
            data: function ( d ) {
               d.csrf_sysx_name  = cv;
             }
  
        },
        table: "#example",
        fields: [ 
          <?php foreach($data_field as $row){
              if($row->name=='id'){ ?>
            {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden"
            },
          <?php }elseif($row->name=='update_by'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
          <?php }elseif($row->name=='update_time'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
        <?php }elseif($row->name=='file_name'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
        <?php }elseif($row->name=='prod_id'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
        <?php }elseif($row->name=='input_by'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
        <?php }elseif($row->name=='input_time'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
         <?php }elseif($row->name=='calc_time'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
        <?php }elseif($row->name=='lifting_no' and $table=='data_special'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "hidden",
            },
             <?php }elseif($row->type=='text'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "text",
            },
            <?php }elseif($row->type=='char'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "select",
             },
          <?php }elseif($row->type=='year'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                def:   function () { return new Date(); },
                format: 'YYYY',
               
            },
          <?php }elseif($row->type=='date'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                def:   function () { return new Date('<?=$this->prod_date;?>'); },
                format: 'YYYY-MM-DD',
               
            },
          <?php }elseif($row->type=='datetime'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                def:   function () { return new Date(); },
                format: 'YYYY-MM-DD HH:mm:ss',
                fieldInfo: 'style date with 24 hour clock',
                opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                }
               
            },
        <?php }elseif($row->name=='file'){ ?>
                 {
                    label: "File:".toUpperCase(),
                    name: "file",
                    className:"p-0 m-0 text-sm",
                    type: "upload",
                    display: function ( file_id ) {
                        return '<img src="'+editor.file( 'files', file_id ).web_path+'"/>';
                    },
                    clearText: "Clear",
                    noImageText: 'No File',
                },
        <?php }elseif($row->type=='time'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
                type: "datetime",
                format: 'HH:mm:ss',
                fieldInfo: '24 hour clock format with seconds',
                opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                }
               
            },
        <?php }elseif($row->name=='shop'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                      { label: "2",value: "2" },
                      { label: "1",value: "1" },
                     
                  ]
                },
          <?php }elseif($row->name=='source'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                      { label: "Regular",value: "regular" },
                      { label: "Special",value: "special" },
                  ]
              },
            <?php }elseif($row->name=='prod_shift'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                      { label: "<?=$this->prod_shift;?>",value: "<?=$this->prod_shift;?>"},
                      { label: "<?=$this->prod_shift1;?>",value: "<?=$this->prod_shift1;?>"},

                  ]
              },
            <?php }elseif($row->name=='seat_code'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                    { label: "ALL",value: "ALL" },
                    { label: "FR",value: "FR" },
                    { label: "RR1",value: "RR1" },
                    { label: "RR2",value: "RR2" }
                  ]
              },
            <?php }elseif($row->name=='side'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                    { label: "ALL",value: "ALL" },
                    { label: "RH",value: "RH" },
                    { label: "LH",value: "LH" },
                    { label: "Bench",value: "Bench" },
                  ]
              },
          <?php }elseif($row->name=='airbag'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  className:"p-0 m-0 text-sm",
                  type: "select",
                  options: [
                      { label: "NO",value: "NO" },
                      { label: "VFC(R)",value: "VFC" },
                      { label: "VFD(L)",value: "VFD" }
                  ]
              },
            <?php }else{ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                className:"p-0 m-0 text-sm",
            },
            <?php } } ?>
            
        ]
    });

    
    var table=$('#example').DataTable( {
        dom: '<"top"QBlf>rt<"bottom"ip><"clear">',
        ajax: {
            url: "<?=base_url('Ajax/plData?table='.$table.'&api='.$this->id_t.'&menuid='.$menuid);?>",
            type: "POST",
            data: csfrData,
  
        },
        processing: true, 
            "language": {
              'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="text-green">Processing ...</span> '
            },
        //if sqlserver serverside false
        serverSide: true,
        scrollY:tinggi,
        scrollX:true,
        paging:true, 
        autoWidth: true,
        pageResize: true,
        lengthMenu: [ [10,15,20, 25, 50,100,500,1000,5000,10000, -1], [10,15,20, 25, 50,100,500,1000,5000,10000, "All"] ],
        pageLength:15,
        
        responsive: false,
        order: [[1,'desc']],
        <?php if($table=='xx'){ ?>
        columnDefs: [
            { "type": "string", "targets": 3 }
          ],
      <?php } ?>
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false,
                searchable: false,
            },
            <?php foreach($data_field as $row){ 
              if($row->name=='update_time'){
              ?>
              { data: "<?=$row->name;?>"},
            <?php }elseif($row->name=='update_by'){ ?>
                { data: "<?=$row->name;?>"},
            <?php }else{ ?>
                { data: "<?=$row->name;?>", className: 'editable'},
             <?php } } ?>
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        colReorder: true,
        buttons: [
            <?php 
            if($get_o->add_level=='yes'){
              if($table=='data_ajs'){ ?>
              { 
                  extend: "create",
                  text: "<span class='text-green'>New<sup><i class='fa fa-plus text-purple'></i></sup></span>",
                  editor: formajs,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
                },

              <?php }elseif($table=='data_special'){ ?>
              { 
                  extend: "create",
                  text: "<span class='text-green'>New<sup><i class='fa fa-plus text-purple'></i></sup></span>",
                  editor: editor,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
                },
              
            <?php }else{ ?>
                { 
                  extend: "create",
                  text: "<span class='text-green'>New</span>",
                  editor: editor,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
                },
            <?php }} if($get_o->edit_level=='yes'){
            if($table=='data_ajs'){ ?>
              { 
                  extend: "edit",
                  text: "<span class='text-green'>Edit</span>",
                  editor: formajs,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
               },
              <?php }elseif($table=='data_special'){ ?>
              { 
                  extend: "edit",
                  text: "<span class='text-green'>Edit</span>",
                  editor: editor,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
               },
              
            <?php }else{ ?>
                { 
                  extend: "edit",
                  text: "<span class='text-green'>Edit</span>",
                  editor: editor,
                  formButtons: [
                        { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                        '<span class="btn btn-outline-success">Submit</span>',
                    ]
               },
            <?php } } if($get_o->delete_level=='yes'){ ?>
            { 
              extend: "remove",
              text: "<span class='text-red'>Delete</span>",
              editor: editor,
              formButtons: [
                    { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                    '<span class="btn btn-outline-success">Submit</span>',
                ]
            },
            <?php } if($get_o->export_level=='yes'){?>
            {
                extend: 'collection',
                text: "<span class='text-green'>Export</span>",
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            },
            <?php } if($get_o->import_level=='yes'){ ?>
            
            {
              text: "<span class='text-green'>Import CSV</span>",
              action: function () {
                uploadEditor.create( {
                  title: "CSV file import <a href='<?=base_url()?>formatexcel/<?=$table;?>.csv' class='btn btn-outline-info' title='Download Format file csv'><span class='fa fa-file-excel-o fa-lg'></span>Download format file</a>"
                } );
                uploadEditor.field('csv').input().val('');

              }
            },
            <?php } ?>
            {
                extend: 'selectAll',
                className: 'btn-space text-green'
            },
            'selectNone',
          <?php if($get_o->print_level=='yes'){
            if($table=='prod_regular' or $table=='prod_special'){ ?>   
              {
                 extend: "selected",
                 text: "<i class='fas fa-print text-green'></i>",
                 className: 'btn btn-print',
                 titleAttr: 'Print Label Seat',
                 action: function () {
                     var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                    //console.log(id);
                  print_l(id,'lbl<?=$table;?>');
                }      
              },
              {
                 extend: "selectedSingle",
                 text: "<i class='fas fa-print text-yellow'></i>",
                 className: 'btn btn-print',
                 titleAttr: 'Print Label Big Part',
                 action: function () {
                     var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                    //console.log(id);
                  print_l(id,'kbn<?=$table;?>');
                }      
              },
            <?php }elseif($table=='data_shipping'){ ?>  
              {
                 extend: "selectedSingle",
                 text: "<i class='fas fa-print text-green'></i>",
                 className: 'btn btn-print',
                 titleAttr: 'Print Surat Jalan',
                 action: function () {
                var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                    //console.log(id);
                  print_l(id,'<?=$table;?>');
                }      
              },
            <?php }} if($get_o->other_level=='yes'){
            if($table=='data_ajs'){ ?>
                {
                    text: '<i class="fas fa-cog  text-info"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Conf AJS',
                    action: function () {
                        formconfajs();
                    }
                },
                {
                 extend: "selectedSingle",
                 text: "<span class='text-danger'>CutOff</span>",
                 titleAttr: 'Cut off shipping',
                 action: function () {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                  cutoff(data.id,data.lifting_no,data.shop);
                }      
              },
            <?php } } if($get_o->del_all=='yes' and $this->user_level=='Administrator'){  ?>
               {
                    text: '<i class="fas fa-recycle  text-red"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Clear All',
                    action: function () {
                        del_all('<?=$table;?>');
                    }
                }
             <?php } ?>
        ],

         initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }

    } );


});
function formconfajs(){
        $.ajax({
                type: "POST",
                url : "<?=base_url('master/formconfajs?api='.$this->id_t); ?>",
                data: "<?=$this->security->get_csrf_token_name();?>="+cv,
                cache:false,
                success: function(data){
                    $("#viewsmall").html(data);
                    $("#myModalsmall").modal('show');
                    
                }
            });
    }

     
function print_sj(lotid){
  swal({
        title: "Are you sure print?",
        text: "Surat Jalan Lotid "+lotid,
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        closeOnConfirm: true,
        //closeOnCancel: false
      },
      function(){
         window.open("<?=base_url('s_print/reprintsj');?>?lotid="+lotid+"&api=<?=$this->id_t;?>", "_blank");

      } ); 
}
function cutoff(id,lifting_no,shop){
  swal({
          title: "Are you sure?",
          text: "You will cutoff shipping " +lifting_no,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes',
          closeOnConfirm: false,
          //closeOnCancel: false
        },
        function(){        
          $.ajax({  
                type: "POST",
                url : "<?=base_url('master/cutoffship?api='.$this->id_t); ?>",
                data: "id="+id+"&shop="+shop+"&<?=$this->security->get_csrf_token_name();?>="+cv,
                cache:false,
                dataType: 'json',
                success: function(data){
                if(data.status==true){
                    swal({
                        title: "Cutoff Success",
                        text: "",
                        type: "success",
                        timer: 1200,
                        showConfirmButton: false
                      });
                   $('#example').DataTable().ajax.reload();
                  }else{
                    swal({
                        title: "Cutoff Failed",
                        text: ""+data.status,
                        type: "warning",
                        timer: 5000,
                        showConfirmButton: false
                      });
                  }
                }
            });
        } );            
    } 
</script>



