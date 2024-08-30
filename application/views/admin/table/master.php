
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-2">
                <table id="example" class="table table-hover table-bordered compact" style="width:100%;font-size: 12px">
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
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Large Modal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div> 
            <div class="modal fade" id="myModal1" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                  <div class="modal-content" id="content1">
                    <div class="modal-header">
                      <h4 class="modal-title">Large Modal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>     
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
         
<script type="text/javascript" language="javascript" class="init">
 var editor;
 var tinggi = ($(window).height() - 415);
  if(parseInt(tinggi)<150){
    var tinggi=150;
  }
$(window).resize(function(){
    var tinggi = ($(window).height()-415);
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

 for ( var i=1 ; i<fields.length ; i++ ) {
    var field = editor.field( fields[i] );
    if(field.name()!='update_by' && field.name()!='update_time'){
      selectEditor.add( {
        label: field.label(),
        name: field.name(),
        type: 'select',
        options: header,
        def: header[i]
      } );
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
        if(field.name()!='update_by' && field.name()!='update_time'){
          for ( var j=0 ; j<csv.length ; j++ ) {
            field.multiSet( j, csv[j][mapped].trim())
          }
        }
    }

  } );
}
// use a global for the submit and return data rendering in the examples
   // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        if(title!=''){
            $(this).html( '<input type="text" placeholder="Search" class="form-control input-sm" style="height: 2 5px !important;"/>' );
        }
        
    } );
 var cv='<?=$this->security->get_csrf_hash(); ?>';
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "<?=base_url('Ajax/mData?table='.$table.'&api='.$this->id_t.'&menuid='.$menuid);?>",
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
             <?php }elseif($row->type=='text'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "text",
            },
            <?php }elseif($row->type=='char'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "select",
            },
          <?php }elseif($row->type=='year'){ ?>
             {
                label: "<?=$row->name;?>:",
                name: "<?=$row->name;?>",
                type: "datetime",
                def:   function () { return new Date(); },
                format: 'YYYY',
               
            },
          <?php }elseif($row->type=='date'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "datetime",
                def:   function () { return new Date(); },
                format: 'YYYY-MM-DD',
               
            },
          <?php }elseif($row->type=='datetime'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "datetime",
                def:   function () { return new Date(); },
                format: 'YYYY-MM-DD HH:mm:ss',
                fieldInfo: 'style date with 24 hour clock',
                opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                }
               
            },
           <?php }elseif($row->type=='time'){ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "datetime",
                format: 'HH:mm:ss',
                fieldInfo: '24 hour clock format with seconds',
                opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                }
               
            },
          <?php }elseif($row->name=='seat_code'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                    { label: "",value: "" },
                    { label: "FR",value: "FR" },
                    { label: "RR1",value: "RR1" },
                    { label: "RR2",value: "RR2" }
                  ]
              },
            <?php }elseif($row->name=='side'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                    { label: "",value: "" },
                    { label: "RH",value: "RH" },
                    { label: "LH",value: "LH" },
                    { label: "Bench",value: "Bench" },
                  ]
              },
          <?php }elseif($row->name=='airbag'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                      { label: "NO",value: "NO" },
                      { label: "VFC(R)",value: "VFC" },
                      { label: "VFD(L)",value: "VFD" }
                  ]
              },
            <?php }elseif($row->name=='shop'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
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
                  type: "select",
                  options: [
                      { label: "Regular",value: "regular" },
                      { label: "Special",value: "special" },
                     
                  ]
              },
            <?php } elseif (explode('_',$row->name)[0] == 'image') { ?> {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "upload",
                display: function(file_id) {
                    return '<a href="' + editor.file('files', file_id).web_path +
                        '?id=<?=time();?>' +
                        '"  target="_blank" title="View File"><img src="' + editor.file('files',
                            file_id).web_path +
                        '?id=<?=time();?>" style="width:150px;height:100px"/></a>';
                },
                clearText: "Clear",
                noImageText: 'No image',
            },
            <?php }elseif($table == 'tbl_m_sop' and $row->name!='id'  and $row->name!='line_no' and $row->name!='model' and $row->name!='part_no' and $row->name!='seat') { ?> 
                {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
                type: "upload",
                display: function(file_id) {
                    return '<a href="' + editor.file('files', file_id).web_path +
                        '?id=<?=time();?>' +
                        '"  target="_blank" title="View File"><img src="' + editor.file('files',
                            file_id).web_path +
                        '?id=<?=time();?>" style="width:150px;height:100px"/></a>';
                },
                clearText: "Clear",
                noImageText: 'No image',
            },

            <?php } elseif($row->name=='color'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                      { label: "",value: "" },
                      { label: "bg-black",value: "bg-black" },
                      { label: "bg-yellow",value: "bg-yellow" },
                      { label: "bg-red",value: "bg-red" },
                     
                  ]
              },
            <?php }elseif($row->name=='jenis_trolley'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                      { label: "",value: "" },
                      { label: "1",value: "1" },
                      { label: "2",value: "2" },
                      { label: "3",value: "3" },
                      { label: "4",value: "4" },
                      { label: "5",value: "5" }
                     
                  ]
              },
            <?php }elseif($row->name=='trolley_name'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                      { label: "",value: "" },
                      { label: "FR & RR 1",value: "FR & RR 1" },
                      { label: "FR",value: "FR" },
                      { label: "RR 1",value: "RR 1" },
                      { label: "RR 2",value: "RR 2" }
                     
                  ]
              },

            <?php }elseif($row->name=='status' and $table!='tbl_m_nutrunner'){ ?>
                {
                  label: "<?=$row->name;?>:".toUpperCase(),
                  name: "<?=$row->name;?>",
                  type: "select",
                  options: [
                      { label: "Active",value: "Active" },
                      { label: "Non Active",value: "Non Active" },
                     
                  ]
              },

            <?php }else{ ?>
             {
                label: "<?=$row->name;?>:".toUpperCase(),
                name: "<?=$row->name;?>",
            },
            <?php }  } ?>
            
        ]
    } );
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
              selectColumns( editor, results.data, results.meta.fields );
            }
          }
        });
      }
    } ]
  } );
    var table=$('#example').DataTable( {
        dom: '<"top"QBlf>rt<"bottom"ip><"clear">',
        ajax: {
            url: "<?=base_url('Ajax/mData?table='.$table.'&api='.$this->id_t.'&menuid='.$menuid);?>",
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
        lengthMenu: [ [10,15,20, 25, 50,500,1000,5000,10000, -1], [10,15,20, 25, 50,500,1000,5000,10000, "All"] ],
        pageLength:15,    
        responsive: false,
        order: [],
        columnDefs: [
            { "type": "string", "targets": 2 }
          ],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false,
                searchable: false,
            },
            <?php foreach($data_field as $row){ if ($menuid=='mastermasterrm2' and $row->name== 'price') {
              }else{
              $nm=explode('_',$row->name);  
              if($row->name=='update_time'){
              ?>
              { data: "<?=$row->name;?>"},
            <?php }elseif($row->name=='update_by'){ ?>
                { data: "<?=$row->name;?>"},
            <?php }elseif($nm[0]=='file'){ ?>
                {
                data: "<?=$row->name;?>",
                className: 'text-center',
                render: function ( file_id ) {
                        return file_id ?
                        '<a href="'+editor.file( 'files', file_id ).web_path + '?id=<?=time();?>' + '?id=<?=time();?>"  target="_blank" title="View File"><i class="fas fa-file-pdf"></i></a>' :
                        null;
                        
                    },
                    defaultContent: "No File",
                    title: "<?=$row->name;?>",
                },
            <?php } elseif ($row->name== 'image_part' and ($table=='tbl_m_childpart' or $table=='tbl_m_spssmall')) { ?> 
                {
                  data: "<?=$row->name;?>",
                  className: 'editable text-center',
                  mRender: function(a, b, data) {
                        return '<a href="<?=base_url('gambar/childpart/');?>' + data.child_part_no +
                        '.jpg?id=<?=time();?>"  target="_blank" title="View File"><image src="<?=base_url('gambar/childpart/');?>' +
                        data.child_part_no + '.jpg?id=<?=time();?>" style="width:50px;height:50px"></a>';
                    
                    },
                    defaultContent: "No image",
              },
            <?php } elseif ($row->name== 'image_part' and $table=='tbl_m_partqc') { ?> 
                {
                  data: "<?=$row->name;?>",
                  className: 'editable text-center',
                  mRender: function(a, b, data) {
                        return '<a href="<?=base_url('gambar/qc_center/');?>' + data.seat_part_no +
                        '.jpg?id=<?=time();?>"  target="_blank" title="View File"><image src="<?=base_url('gambar/qc_center/');?>' +
                        data.seat_part_no + '.jpg?id=<?=time();?>" style="width:50px;height:50px"></a>';
                    
                    },
                    defaultContent: "No image",
              },
            <?php } elseif ($row->name== 'image_part' and $table=='tbl_m_problemno') { ?> 
                {
                  data: "<?=$row->name;?>",
                  className: 'editable text-center',
                  mRender: function(a, b, data) {
                        return '<a href="<?=base_url('gambar/problem_no/');?>' + data.seat_part_no + '_' + data.problem_no +
                        '.jpg?id=<?=time();?>"  target="_blank" title="View File"><image src="<?=base_url('gambar/problem_no/');?>' +
                        data.seat_part_no + '_' + data.problem_no + '.jpg?id=<?=time();?>" style="width:50px;height:50px"></a>';
                    
                    },
                    defaultContent: "No image",
              },
           <?php } elseif ($row->name== 'image_part') { ?> 
                {
                  data: "<?=$row->name;?>",
                    mRender: function(file_id) {
                       if (file_id) {
                          return file_id ?
                            '<a href="' + editor.file('files', file_id).web_path + '?id=<?=time();?>"  target="iframe_a" onclick="filex()" title="View File"><image src="' + editor.file('files', file_id).web_path + '?id=<?=time();?>" style="width:50px;"></a>' :
                            null;
                        }
                    
                    },
                    defaultContent: "No image",
              },
             <?php } elseif (explode('_',$row->name)[0] == 'image' and $table=='tbl_m_boxpicking') { ?> 
                {
                  data: "<?=$row->name;?>",
                  className: 'editable text-center',
                  mRender: function(a, b, data) {
                    return '<a href="<?=base_url('gambar/picking/');?>' + data.pos_picking +
                        '.jpg?id=<?=time();?>"  target="_blank" title="View File"><image src="<?=base_url('gambar/picking/');?>' +
                        data.pos_picking + '.jpg?id=<?=time();?>" style="width:50px;height:50px"></a>';
                  
                  },
                  defaultContent: "No image",
              },
              
            <?php }elseif ($table=='tbl_m_sop'  and $row->name!='id' and $row->name!='line_no' and $row->name!='model' and $row->name!='part_no' and $row->name!='seat') { ?> 
                {
                  data: "<?=$row->name;?>",
                  className: 'editable text-center',
                  mRender: function(a, b, data) {
                        return '<a href="<?=base_url('gambar/'.$row->name.'/');?>' + data.part_no +
                        '.jpg?id=<?=time();?>"  target="_blank" title="View File"><image src="<?=base_url('gambar/'.$row->name.'/');?>' +
                        data.part_no + '.jpg?id=<?=time();?>" style="width:50px;height:50px"></a>';
                    
                    },
                    defaultContent: "No image",
              },
            <?php }else{ ?>
                { data: "<?=$row->name;?>"},
             <?php } }} ?>
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        colReorder: true,
        buttons: [
            <?php if($get_o->add_level=='yes'){ ?>
            { 
              extend: "create",
              text: "<span class='text-green'>New</span>",
              editor: editor,
              formButtons: [
                    { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                    '<span class="btn btn-outline-success">Submit</span>',
                ]
            },
            <?php } if($get_o->edit_level=='yes'){ ?>
            { 
              extend: "edit",
              text: "<span class='text-green'>Edit</span>",
              editor: editor,
              formButtons: [
                    { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                    '<span class="btn btn-outline-success">Submit</span>',
                ]
           },
            <?php } if($get_o->delete_level=='yes'){ ?>
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
            if($table=='tbl_m_basepallet'){ ?> 
            {
             extend: "selected",
             text: "<i class='fas fa-print text-green'></i>",
             className: 'btn btn-print',
             titleAttr: 'Print Label', 
             action: function () {
                  var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                  print_l(id,'<?=$table;?>');
                }      
              },
        <?php }elseif($table=='tbl_master_operator'){ ?> 
            {
             extend: "selected",
             text: "<i class='fas fa-print text-green'></i>",
             className: 'btn btn-print',
             titleAttr: 'Print Label', 
             action: function () {
                  var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                  print_l(id,'<?=$table;?>');
                }      
              },
             <?php }} 
             if($get_o->other_level=='yes'){
              if($table=='tbl_m_plc'){ ?>  
                {
                 extend: "selectedSingle",
                 text: '<i class="fas fa-network-wired  text-green"></i>',
                 className: 'btn btn-default plc',
                 titleAttr: 'Test PLC',
                  action: function () {
                  var idx = table.cell('.selected', 0).index();
                  var data = table.row( idx.row ).data();
                  var tipe_data = data.tipe_data;
                    if(tipe_data=='Jig'){
                      formtestplc(data.id,data.ip_address,data.pos,data.plc_name);
                    }else{
                      $('.plc').addClass('disabled')
                    }
                  }
                },
            <?php }elseif($table=='tbl_m_boxpicking'){ ?> 
                {
                extend: "selectedSingle",
                text: "Update View",
                titleAttr: 'Update View',
                action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                    formupdateview(data.pos_picking);
                }
                },
            <?php }elseif($table=='tbl_m_partqc'){ ?> 
                {
                extend: "selectedSingle",
                text: "Update View",
                titleAttr: 'Update View',
                action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                    formupdateviewqc(data.seat_part_no);
                }
                },
            <?php } } if($get_o->del_all=='yes'){  ?>
               {
                 text: '<i class="fas fa-recycle  text-red"></i>',
                 className: 'btn btn-default',
                 titleAttr: 'Reset ID',
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
//console.log($.fn.dataTable.version);
function formtestplc(id,ip,pos,plc_name){
    $.ajax({
            type: "POST",
            url : "<?=base_url('master/formtestplc?api='.$this->id_t); ?>",
            data: "<?=$this->security->get_csrf_token_name();?>="+cv+"&id="+id+"&ip="+ip+"&pos="+pos+"&plc_name="+plc_name,
            cache:false,
            success: function(data){
                $("#content1").html(data);
                $("#myModal1").modal('show'); 
            }
        });
}
function formupdateview(pos_picking){
        $.ajax({
                type: "POST",
                url : "<?=base_url('master/formupdateview?api='.$this->id_t); ?>",
                data: "<?=$this->security->get_csrf_token_name();?>="+cv+"&pos_picking="+pos_picking,
                cache:false,
                success: function(data){
                    $(".modal-content").html(data);
                    $("#myModal").modal('show');
                    
                }
            });
    }
function formupdateviewqc(seat_part_no){
        $.ajax({
                type: "POST",
                url : "<?=base_url('master/formupdateviewqc?api='.$this->id_t); ?>",
                data: "<?=$this->security->get_csrf_token_name();?>="+cv+"&seat_part_no="+seat_part_no,
                cache:false,
                success: function(data){
                    $(".modal-content").html(data);
                    $("#myModal").modal('show');
                    
                }
            });
    }
</script>



