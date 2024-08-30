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
                            <th>USERNAME</th>
                            <th>NAMA</th>
                            <th>NIK</th>
                            <th>SHIFT</th>
                            <th>IMG</th>
                            <th>LEVEL</th>
                            <th>REG_DATE</th>
                            <th>LAST_LOGIN</th>
                            <th>LAST_LOGOUT</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
  var tinggi = ($(window).height() - 425);
  if (parseInt(tinggi) < 150) {
    var tinggi = 150;
  }
  $(window).resize(function() {
    var tinggi = ($(window).height() - 425);
    if (parseInt(tinggi) < 150) {
      var tinggi = 150;
    }
    if (parseInt($('#example').css('height')) >= tinggi) {
      $('.dataTables_scrollBody').css('height', tinggi);
      $('.dataTables_scrollBody').css('max-height', tinggi);
    }
  });
function selectColumns ( editor, csv, header ) {
  var selectEditor = new $.fn.dataTable.Editor();
  var fields = editor.order();

  for ( var i=0 ; i<fields.length ; i++ ) {
    var field = editor.field( fields[i] );

    selectEditor.add( {
      label: field.label(),
      name: field.name(),
      type: 'select',
      options: header,
      def: header[i]
    } );
  }

  selectEditor.create({
    title: 'Map CSV fields',
    buttons: 'Import '+csv.length+' records',
    message: 'Select the CSV column you want to use the data from for each field.'
  });

  selectEditor.on('submitComplete', function (e, json, data, action) {
    // Use the host Editor instance to show a multi-row create form allowing the user to submit the data.
    editor.create( csv.length, {
      title: 'Confirm import',
      buttons: 'Submit',
      message: 'Click the <i>Submit</i> button to confirm the import of '+csv.length+' rows of data. Optionally, override the value for a field to set a common value by clicking on the field below.'
    } );

    for ( var i=0 ; i<fields.length ; i++ ) {
      var field = editor.field( fields[i] );
      var mapped = data[ field.name() ];

      for ( var j=0 ; j<csv.length ; j++ ) {
        field.multiSet( j, csv[j][mapped] );
      }
    }
  } );
}
    // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
 var cv='<?=$this->security->get_csrf_hash(); ?>';
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "<?=base_url('Ajax/pData?api='.$id_t);?>",
            type: "POST",
            data: function ( d ) {
               d.csrf_sysx_name  = cv;
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
                label: "Nama:",
                name: "nama"
            },
            {
                label: "NIK:",
                name: "nik"
            },
            {
                label: "Username:",
                name: "username"
            },
            {
                label: "Password:",
                name: "password",
                type:"password"
            },
             {
                label: "Shift:",
                name: "shift",
                type: "select",
            },  
             {
                label: "IMAGE:",
                name: "image",
                type: "upload",
                display: function ( file_id ) {
                    return '<img src="'+editor.file( 'files', file_id ).web_path+'?id=<?=time();?>"/>';
                },
                clearText: "Clear",
                noImageText: 'No image',
            }                     
        ],
           i18n: {
                edit: {
                    title:  "FORM UPDATE PROFILE"
                }
            }
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
          skipEmptyLines: true,
          complete: function (results) {
            if ( results.errors.length ) {
              console.log( results );
              uploadEditor.field('csv').error( 'CSV parsing error: '+ results.errors[0].message );
            }
            else {
              uploadEditor.close();
              selectColumns( editor, results.data, results.meta.fields );
            }
          }
        });
      }
    } ]
  } );
    
     
    
    var table=$('#example').DataTable( {
        dom: '<"top"Blf>rt<"bottom"ip><"clear">',
        ajax: {
            url: "<?=base_url('Ajax/pData?api='.$id_t);?>",
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
        lengthMenu: [ [10,15,20, 25, 50, -1], [10,15,20, 25, 50, "All"] ],
        pageLength:15,
        
        responsive: false,
        order: [],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false,
                searchable: false,
            },
            { 
                data: "username"
            },
            { 
                data: "nama"
            },
            { 
                data: "nik"
            },
            { 
                data: "shift"
            },
            {
                data: "image",
                render: function ( file_id ) {
                    return file_id ?
                        '<img src="'+editor.file( 'files', file_id ).web_path+'?id=<?=time();?>" style="width:30px;"/>' :
                        null;
            },
            defaultContent: "No image",
            title: "IMAGE"
            },
            { 
                data: "user_level"
            },
            { 
                data: "registrasi"
            },
            { 
                data: "log_in"
            },
            { 
                data: "log_out"
            }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        colReorder: true,
        buttons: [
           
            { 
              extend: "edit",
              text: "<span class='text-green'>Edit</span>",
              editor: editor,
              formButtons: [
                    { text: '<span class="btn btn-outline-danger">Cancel</span>', action: function () { this.close(); } },
                    '<span class="btn btn-outline-success">Submit</span>',
                ]
           },
            {
             extend: "selected",
             text: "<i class='fas fa-print text-green'></i>",
             className: 'btn btn-print',
             titleAttr: 'Print ID Card', 
             action: function () {
                  var id =[];
                  var data = table.rows('.selected').data();
                    for (var i = 0; i < data.length; i++) {
                      id.push(data[i].id);
                    }
                    print_l(id,'<?=$table;?>');
                }      
              },
            
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
</script>



