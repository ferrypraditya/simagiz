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
                      <?php
                      foreach ($data_field as $row) { 
                        echo "<th>" . strtoupper($row->name) . "</th>";

                      } ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>

                      <?php
                      foreach ($data_field as $row) {
                        echo "<th>" . strtoupper($row->name) . "</th>";
                      } ?>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="myModal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content" id="view">

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="myModal1">
              <div class="modal-dialog modal-xl  modal-dialog-scrollable">
                <div class="modal-content" id="view1">

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
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
      $(document).ready(function() {
        $('#example tfoot th').each(function() {
          var title = $(this).text();
          if (title != '') {
            $(this).html('<input type="text" placeholder="Search" class="form-control input-sm" style="height: 2 5px !important;"/>');
          }

        });
        editor1 = new $.fn.dataTable.Editor({
          ajax: {
              url: "<?= base_url('Ajax/tData?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
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

                  label: "id_kbn:",
                  name: "id_kbn",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "part_no:",
                  name: "part_no",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "store:",
                  name: "store",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
               {

                  label: "total_sto:",
                  name: "total_sto",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
               {

                  label: "yos_stock:",
                  name: "yos_stock",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "judge_stock:",
                  name: "judge_stock",
              },


          ],
           i18n: {
                edit: {
                    title:  "FORM JUDGE REALTIME STOCK YOS"
                }
            }
      });
        editor2 = new $.fn.dataTable.Editor({
          ajax: {
              url: "<?= base_url('Ajax/tData?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
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

                  label: "id_kbn:",
                  name: "id_kbn",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "part_no:",
                  name: "part_no",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "store:",
                  name: "store",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
               {

                  label: "total_pcs:",
                  name: "total_pcs",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
               {

                  label: "yos_stock:",
                  name: "yos_stock",
                  type: 'readonly',
                  attr: {
                      disabled: true
                  }
              },
              {

                  label: "judge_stock:",
                  name: "judge_stock",
              },


          ],
           i18n: {
                edit: {
                    title:  "FORM JUDGE REALTIME STOCK YOS"
                }
            }
      });
        editconf = new $.fn.dataTable.Editor({
        ajax: {
            url: "<?= base_url('Ajax/tData?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
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
                label: "PosPosting:",
                name: "pos_posting",
                type:"readonly"
            },
            {
                label: "Time:",
                name: "posting_date",
                type:"readonly"
            },
            {
                label: "TrueRack:",
                name: "true_rack_no",
                type:"readonly"
            },
            {
                label: "FalseRack:",
                name: "false_rack_no",
                type:"readonly"
            },
            {
                label: "Problem:",
                name: "problem",
                type:"text"
            },
        ]
    });
        editor = new $.fn.dataTable.Editor({
          ajax: {
            url: "<?= base_url('Ajax/tData?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
            type: "POST",
            data: function(d) {
              d.csrf_sysx_name = cv;
            }

          },
          table: "#example",
          fields: [
            <?php foreach ($data_field as $row) {
              if ($row->name == 'id') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "hidden"
                },
              <?php } elseif ($row->name == 'update_by') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "hidden",
                },
              <?php } elseif ($row->name == 'update_time') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "hidden",
                },
              <?php } elseif ($row->type == 'text') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "text",
                },
              <?php } elseif ($row->type == 'char') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "select",
                },
              <?php } elseif ($row->type == 'year') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "datetime",
                  def: function() {
                    return new Date();
                  },
                  format: 'YYYY',

                },
              <?php } elseif ($row->type == 'date') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "datetime",
                  def: function() {
                    return new Date();
                  },
                  format: 'YYYY-MM-DD',

                },
              <?php } elseif ($row->type == 'datetime') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "datetime",
                  def: function() {
                    return new Date();
                  },
                  format: 'YYYY-MM-DD HH:mm:ss',
                  fieldInfo: 'style date with 24 hour clock',
                  opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                  }

                },
              <?php } elseif ($row->type == 'time') { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                  type: "datetime",
                  format: 'HH:mm:ss',
                  fieldInfo: '24 hour clock format with seconds',
                  opts: {
                    minutesIncrement: 1,
                    secondsIncrement: 1
                  }

                },
              <?php } else { ?> {
                  label: "<?= $row->name; ?>:",
                  name: "<?= $row->name; ?>",
                },
            <?php }
            } ?>

          ]
        });
        var uploadEditor = new $.fn.dataTable.Editor({
          fields: [{
            label: 'CSV file:',
            name: 'csv',
            type: 'upload',
            ajax: function(files) {
              // Ajax override of the upload so we can handle the file locally. Here we use Papa
              // to parse the CSV.
              Papa.parse(files[0], {
                header: true,
                skipEmptyLines: true,
                complete: function(results) {
                  if (results.errors.length) {
                    console.log(results);
                    uploadEditor.field('csv').error('CSV parsing error: ' + results.errors[0].message);
                  } else {
                    selectColumns(editor, results.data, results.meta.fields);
                  }
                }
              });
            }
          }]
        });
        <?php if ($get_o->edit_level == 'yesx') { ?>
          // Activate an inline edit on click of a table cell
          $('#example').on('click', 'tbody td.editable:not(:first-child)', function(e) {
            editor.inline(this, {
              onBlur: 'submit',
              submit: 'allIfChanged'
            });
          });
        <?php } ?>

        var table = $('#example').DataTable({
          dom: '<"top"QBlf>rt<"bottom"ip><"clear">',
          ajax: {
            url: "<?= base_url('Ajax/tData?table=' . $table . '&api=' . $this->id_t . '&menuid=' . $menuid); ?>",
            type: "POST",
            data: csfrData,

          },
          processing: true,
          "language": {
            'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="text-green">Processing ...</span> '
          },
          //if sqlserver serverside false
          serverSide: true,
          scrollY: tinggi,
          scrollX: true,
          paging: true,
          autoWidth: true,
          pageResize: true,
          lengthMenu: [
            [10, 15, 20, 25, 50, 500, 1000, 5000, 10000, -1],
            [10, 15, 20, 25, 50, 500, 1000, 5000, 10000, "All"]
          ],
          pageLength: 15,

          responsive: false,
          order: [
            [1, 'desc']
          ],
           columnDefs: [
            { "type": "string", "targets": 3 }
          ],
          columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false,
                searchable: false,
            },
            <?php foreach ($data_field as $row) {
              if ($row->name == 'update_time') {
            ?> {
                  data: "<?= $row->name; ?>"
                },
              <?php } elseif ($row->name == 'update_by') { ?> {
                  data: "<?= $row->name; ?>"
                },
              <?php } else { ?> {
                  data: "<?= $row->name; ?>",
                  className: 'editable'
                },
            <?php }
            } ?>
          ],
          select: {
            style: 'os',
            selector: 'td:first-child'
          },
          colReorder: true,
          buttons: [
            <?php if ($get_o->add_level == 'yes') {
              if ($table == 'tbl_h_assy') { ?> {
                  text: 'Add Data',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Add Manual Seat',
                  action: function() {
                    formaddseat('<?= $table; ?>');
                  }
                },
              <?php } elseif ($table == 'tbl_delvtosubcont') { ?> {
                  extend: "selectedSingle",
                  text: 'Receiving',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Reciving Part',
                  action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                    formrecsjsc(data.sj_no,'<?= $table; ?>');
                  }
                },
              <?php } elseif ($table == 'view_finish_setting') { ?> {
                  extend: "selectedSingle",
                  text: 'Finish Setting',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Finish Setting',
                  action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                    formfinishset(data.order_no);
                  }
                },
              <?php } elseif ($table == 'tbl_h_stopart') { ?> {
                  extend: "create",
                  text: "<span class='text-green'>New</span>",
                  editor: editor,
                  formButtons: [{
                      text: '<span class="btn btn-outline-danger">Cancel</span>',
                      action: function() {
                        this.close();
                      }
                    },
                    '<span class="btn btn-outline-success">Submit</span>',
                  ]
                },
                {
                  text: 'Docking',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Docking STO Part',
                  action: function() {
                    formdockingpart('<?= $table; ?>');
                  }
                },
                {
                    text: 'STO -> Posting',
                    className: 'btn btn-cs text-green',
                    titleAttr: 'Transfer to Posting',
                    action: function() {
                      formtrposting('<?= $table; ?>');
                    }
                  },
                <?php } elseif ($table == 'tbl_h_stotl') { ?> {
                  extend: "create",
                  text: "<span class='text-green'>New</span>",
                  editor: editor,
                  formButtons: [{
                      text: '<span class="btn btn-outline-danger">Cancel</span>',
                      action: function() {
                        this.close();
                      }
                    },
                    '<span class="btn btn-outline-success">Submit</span>',
                  ]
                },
                {
                  text: 'Docking',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Docking STO TL',
                  action: function() {
                    formdockingtl('<?= $table; ?>');
                  }
                },
              <?php } elseif ($table == 'tbl_h_stomat') { ?> {
                  extend: "create",
                  text: "<span class='text-green'>New</span>",
                  editor: editor,
                  formButtons: [{
                      text: '<span class="btn btn-outline-danger">Cancel</span>',
                      action: function() {
                        this.close();
                      }
                    },
                    '<span class="btn btn-outline-success">Submit</span>',
                  ]
                },
                {
                  text: 'Docking',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Docking STO Mat',
                  action: function() {
                    formdockingmat('<?= $table; ?>');
                  }
                },
                {
                    text: 'STO -> Posting',
                    className: 'btn btn-cs text-green',
                    titleAttr: 'Transfer to Posting',
                    action: function() {
                      formtrposting('<?= $table; ?>');
                    }
                  },
              <?php } elseif ($table == 'tbl_h_beritaacara') {
                ?> {
                    extend: "selectedSingle",
                    text: 'Judge',
                    className: 'btn btn-cs text-green',
                    titleAttr: 'Judge Stock Problem',
                    action: function() {
                      var idx = table.cell('.selected', 0).index();
                        var data = table.row(idx.row).data();
                        if (data.status=='Open') {
                          formjudgeba(data.id,'<?= $table; ?>');
                        }
                      }
                  },
                <?php } elseif ($table == 'tbl_delvtoyoska') {
                if ($get_o->value_level != '') { ?>
                 {
                    text: 'Create DN',
                    className: 'btn btn-cs text-green',
                    titleAttr: 'Create Delivery Note',
                    action: function() {
                      formcreatesjsc('<?= $table; ?>');
                    }
                  },
                <?php } ?> 
                  
              <?php } else { ?> {
                  extend: "create",
                  text: "<span class='text-green'>New</span>",
                  editor: editor,
                  formButtons: [{
                      text: '<span class="btn btn-outline-danger">Cancel</span>',
                      action: function() {
                        this.close();
                      }
                    },
                    '<span class="btn btn-outline-success">Submit</span>',
                  ]
                },
              <?php }
            }
            if ($get_o->edit_level == 'yes'){
              if($table=='docking_stomat'){ ?>
              {
                extend: "edit",
                text: "<span class='text-green'>Judge Stock</span>",
                editor: editor2,
                formButtons: [{
                    text: '<span class="btn btn-outline-danger">Cancel</span>',
                    action: function() {
                      this.close();
                    }
                  },
                  '<span class="btn btn-outline-success">Submit</span>',
                ]
              },
              {
               extend: "edit",
                text: "<span class='text-green'>Edit</span>",
                editor: editor,
                formButtons: [{
                    text: '<span class="btn btn-outline-danger">Cancel</span>',
                    action: function() {
                      this.close();
                    }
                  },
                  '<span class="btn btn-outline-success">Submit</span>',
                ]
              },
            <?php }else{ ?>
              {
               extend: "edit",
                text: "<span class='text-green'>Edit</span>",
                editor: editor,
                formButtons: [{
                    text: '<span class="btn btn-outline-danger">Cancel</span>',
                    action: function() {
                      this.close();
                    }
                  },
                  '<span class="btn btn-outline-success">Submit</span>',
                ]
              },
            <?php } } if ($get_o->delete_level == 'yes') { ?> {
                extend: "remove",
                text: "<span class='text-red'>Delete</span>",
                editor: editor,
                formButtons: [{
                    text: '<span class="btn btn-outline-danger">Cancel</span>',
                    action: function() {
                      this.close();
                    }
                  },
                  '<span class="btn btn-outline-success">Submit</span>',
                ]
              },
            <?php }
            if ($get_o->export_level == 'yes') { ?> {
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
            <?php }
            if ($get_o->import_level == 'yes') { ?>
              {
                text: "<span class='text-green'>Import CSV</span>",
                action: function() {
                  uploadEditor.create({
                    title: "CSV file import <a href='<?= base_url() ?>formatexcel/<?= $table; ?>.csv' class='btn btn-outline-info' title='Download Format file csv'><span class='fa fa-file-excel-o fa-lg'></span>Download format file</a>"
                  });
                  uploadEditor.field('csv').input().val('');

                }
              },
            <?php } ?> {
              extend: 'selectAll',
              className: 'btn-space text-green'
            },
            'selectNone',
            <?php if ($get_o->print_level == 'yes') {
              if ($table == 'tbl_delvtosubcont') { ?> 
                {
                  extend: "selectedSingle",
                  text: 'Print SJ',
                  className: 'btn btn-cs text-green',
                  titleAttr: 'Print SJ',
                  action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                      print_sjsc(data.sj_no, '<?= $table; ?>');
                  }
                },
              <?php } elseif ($table == 'tbl_delvtoyoska') { ?>
               {
                  extend: "selectedSingle",
                  text: "Print DN",
                  titleAttr: 'Re-Print DN',
                  action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                    if (data.sj_date != null) {
                      print_l(data.id, '<?= $table; ?>');
                    }
                   }
                  },
               <?php } elseif ($table == 'tbl_h_qc') { ?>
               {
                  extend: "selectedSingle",
                  text: "Print",
                  titleAttr: 'Re-Print Checksheet',
                  action: function() {
                    var idx = table.cell('.selected', 0).index();
                    var data = table.row(idx.row).data();
                      print_l(data.id, '<?= $table; ?>');
                   }
                  },
              <?php }
            }
            if ($get_o->other_level == 'yes') {
             if ($table == 'tbl_mis_conf') { ?> 
              {
                extend: "edit",
                text: "<span class='text-warning'>Conf Leader</span>",
                editor: editconf,
                formTitle: '<h3>Form Confirm Mis Posting</h3>',
                formButtons: [{
                        text: '<span class="btn btn-outline-danger">Cancel</span>',
                        action: function() {
                            this.close();
                        }
                    },
                    '<span class="btn btn-outline-success">Submit</span>',
                ]
            },
            <?php }} if ($get_o->del_all == 'yes') {  ?> 
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

          initComplete: function() {
            // Apply the search
            this.api().columns().every(function() {
              var that = this;

              $('input', this.footer()).on('keyup change clear', function() {
                if (that.search() !== this.value) {
                  that
                    .search(this.value)
                    .draw();
                }
              });
            });
          }

        });

      });

      function formreprod(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('report/form_add_report_production?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }

      function form_reprint_sj(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('s_print/form_reprint_sj?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }

      function print_sjsc(sj_no,table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('s_print/form_print_sjsc?api=' . $this->id_t); ?>",
          data: "sj_no=" + sj_no +"&table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }

      function print_labelsc(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('s_print/form_print_labelsc?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
      function formjudgeba(id,table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formjudgeba?api=' . $this->id_t); ?>",
          data: "id=" + id+"&table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
      function formrecsjsc(sj_no,table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formrecsjsc?api=' . $this->id_t); ?>",
          data:  "table=" + table +"&sj_no=" + sj_no + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv + "&val=<?=$get_o->value_level; ?>",
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }

      function formcreatesjsc(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formcreatesjsc?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv + "&val=<?= $get_o->value_level; ?>",
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }

      function formdockingpart(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formdockingpart?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
 function formdockingtl(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formdockingtl?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
      function formdockingmat(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formdockingmat?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
      function formtrposting(table) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('master/formtrposting?api=' . $this->id_t); ?>",
          data: "table=" + table + "&<?= $this->security->get_csrf_token_name(); ?>=" + cv,
          cache: false,
          success: function(data) {
            $(".modal-content").html(data);
            $("#myModal").modal('show');

          }
        });
      }
      function formaddseat(){
        $.ajax({
                type: "POST",
                url : "<?=base_url('master/formaddseat?api='.$this->id_t); ?>",
                data: "<?=$this->security->get_csrf_token_name();?>="+cv,
                cache:false,
                success: function(data){
                    $(".modal-content").html(data);
                    $("#myModal").modal('show');
                    
                }
            });
    }
      
    </script>