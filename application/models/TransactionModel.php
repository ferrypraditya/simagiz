<?php
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;

class TransactionModel extends CI_Model
{
    private $editorDb = null;

    //constructor which loads the CodeIgniter database class (not required)
    public function __construct()
    {
        // $this->load->database();
    }

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
        $this->editorDb->sql('set names utf8mb4 collate utf8mb4_unicode_ci');
    }
    public function getData($post,$table,$api,$menuid)
    {
        $q=$this->s_model->s_access($api)->row(); 
        $nama=$q->nama; 
        $user_area=$q->user_area;
        $user_level=$q->user_level;
        $user_group=$q->user_group;
        $username=$q->username;
        $get_o=$this->db->get_where('tbl_menu_user',array('menuid'=>$menuid,'username'=>$username),1)->row();
        $field=$get_o->field_level;
        $value=$get_o->value_level;

        if($table=='tbl_h_delay'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( Validate::dateFormat(
                            'Y-m-d',ValidateOptions::inst()->allowEmpty( false )
                         ) )->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_hour')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('problem')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('seat')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('datetime')->validator( Validate::dateFormat(
                            'Y-m-d H:i:s',ValidateOptions::inst()->allowEmpty( false )
                         ) )->validator( 'Validate::notEmpty' ),
                    Field::inst('durasi')->validator( 'Validate::notEmpty' )
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='temp_pickingsmall'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_picking'),
                    Field::inst('controller_no'),
                    Field::inst('qrcode'),
                    Field::inst('lifting_no'),
                    Field::inst('model'),
                    Field::inst('seat_part_no'),
                    Field::inst('code'),
                    Field::inst('grade'),
                    Field::inst('suffix'),
                    Field::inst('takt_time_small'),
                    Field::inst('child_part_no'),
                    Field::inst('child_part_name'),
                    Field::inst('qty_picking'),
                    Field::inst('rack_no'),
                    Field::inst('picking_no'),
                    Field::inst('box_no'),
                    Field::inst('start'),
                    Field::inst('finish'),
                    Field::inst('status'),
                    Field::inst('rack_awal')->setFormatter( Format::ifEmpty(null) )

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='temp_pickingbig'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_picking'),
                    Field::inst('controller_no'),
                    Field::inst('qrcode'),
                    Field::inst('lifting_no'),
                    Field::inst('model'),
                    Field::inst('seat_part_no'),
                    Field::inst('code'),
                    Field::inst('grade'),
                    Field::inst('suffix'),
                    Field::inst('suffix_master'),
                    Field::inst('takt_time_big'),
                    Field::inst('child_part_no'),
                    Field::inst('child_part_name'),
                    Field::inst('qty_picking'),
                    Field::inst('season'),
                    Field::inst('rack_no'),
                    Field::inst('picking_no'),
                    Field::inst('start'),
                    Field::inst('finish'),
                    Field::inst('status'),
                    Field::inst('rack_awal')->setFormatter( Format::ifEmpty(null) )

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_pickingsmall'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_picking')->validator( 'Validate::notEmpty' ),
                    Field::inst('controller_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('takt_time_small')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('qty_picking')->validator( 'Validate::notEmpty' ),
                    Field::inst('rack_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('picking_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('box_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('start')->validator( 'Validate::notEmpty' ),
                    Field::inst('finish')->validator( 'Validate::notEmpty' ),
                    Field::inst('status')->validator( 'Validate::notEmpty' ),
                    Field::inst('rack_awal')->setFormatter( Format::ifEmpty(null) )

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_pickingbig'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_picking')->validator( 'Validate::notEmpty' ),
                    Field::inst('controller_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix_master'),
                    Field::inst('takt_time_big')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('qty_picking')->validator( 'Validate::notEmpty' ),
                    Field::inst('season')->validator( 'Validate::notEmpty' ),
                    Field::inst('rack_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('picking_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('start')->validator( 'Validate::notEmpty' ),
                    Field::inst('finish')->validator( 'Validate::notEmpty' ),
                    Field::inst('status')->validator( 'Validate::notEmpty' ),
                    Field::inst('rack_awal')->setFormatter( Format::ifEmpty(null) )

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_qc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_hour')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('pos')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('problem_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('child_part_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('problem')->validator( 'Validate::notEmpty' ),
                    Field::inst('qc_time')->validator( 'Validate::notEmpty' ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_temp_subassy'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('idseat')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('variant')->validator( 'Validate::notEmpty' ),
                    Field::inst('andon_time')->setFormatter( Format::ifEmpty(null) )
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_problemso'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('problem_time')->validator( 'Validate::notEmpty' ),
                    Field::inst('problem')->validator( 'Validate::notEmpty' ),
                    Field::inst('shop')->validator( 'Validate::notEmpty' ),
                    Field::inst('sliporder')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('data_last')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('conf_by')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('conf_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('remarks')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
         }elseif($table=='tbl_history_subassy'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('idseat')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('variant')->validator( 'Validate::notEmpty' ),
                    Field::inst('andon_time')->setFormatter( Format::ifEmpty(null) )
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_calcprod'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('lotid')->validator( 'Validate::notEmpty'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('shop')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('trip')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('line_no')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('grade')->validator( 'Validate::notEmpty'),
                Field::inst('job_no')->validator( 'Validate::notEmpty'),
                Field::inst('part_no')->validator( 'Validate::notEmpty'),
                Field::inst('item')->validator( 'Validate::notEmpty'),
                Field::inst('idseat')->validator( 'Validate::notEmpty' ),
                Field::inst('code')->validator( 'Validate::notEmpty'),
                Field::inst('model')->validator( 'Validate::notEmpty'),
                Field::inst('variant')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('lifting_set')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('suffix')->validator( 'Validate::notEmpty'),
                Field::inst('qrcode')->validator( 'Validate::notEmpty')->validator( 'Validate::unique' ),
                Field::inst('calc_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('lbl_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('kbn_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('picking_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_status')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps1_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps2_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps3_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps4_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps5_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps6_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon1_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon2_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon3_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon4_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon5_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon6_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('andon7_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('assystart_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }else{
                        //  $editor->where( function ( $q ) {
                        //     $q->order('id desc');
                        // });
                     }
                     
                      
                } )
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table,$id, $values['qrcode'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table,$id, $values['qrcode'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table,0, $values['qrcode'],$nama);
                    
            } )     
            ->process( $post )
            ->json();
        }elseif($table=='tbl_temp_sps'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('idseat')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('sps_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('setting_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('qty_lifting'),
                    Field::inst('id_print'),
                    Field::inst('lifting_set')
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
         }elseif($table=='tbl_history_calc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('lotid')->validator( 'Validate::notEmpty'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('shop')->validator( 'Validate::notEmpty'),
                Field::inst('trip')->validator( 'Validate::notEmpty'),
                Field::inst('idseat')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')->validator( 'Validate::notEmpty'),
                Field::inst('item')->validator( 'Validate::notEmpty'),
                Field::inst('inputsoj')->validator( 'Validate::notEmpty'),
                Field::inst('hrp')->validator( 'Validate::notEmpty'),
                Field::inst('cancel')->validator( 'Validate::notEmpty'),
                Field::inst('overprod')->validator( 'Validate::notEmpty'),
                Field::inst('calc')->validator( 'Validate::notEmpty'),
                Field::inst('lot')->validator( 'Validate::notEmpty'),
                Field::inst('prod')->validator( 'Validate::notEmpty' ),
                Field::inst('last_order')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('last_prod')->setFormatter( Format::ifEmpty(null) )
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                     
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_soj'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('lotid')->validator( 'Validate::notEmpty'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('shop')->validator( 'Validate::notEmpty'),
                Field::inst('trip')->validator( 'Validate::notEmpty'),
                Field::inst('sliporder')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')->validator( 'Validate::notEmpty'),
                Field::inst('urutan')->validator( 'Validate::notEmpty'),
                Field::inst('convert_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('shipping_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                
                        });
                     }
                     
                } )
            ->on( 'postEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->changeSoj($id, $values );
                $this->logdate('edit'.$table,$id, $values['lifting_no'].'|'.$values['suffix'].'|'.$values['lotid'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->removeSoj($id, $values);
                $this->logdate('remove'.$table,$id, $values['lifting_no'].'|'.$values['suffix'].'|'.$values['lotid'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table,0, $values['lifting_no'].'|'.$values['suffix'].'|'.$values['lotid'],$nama);
                    
            } ) 
            ->process( $post )
            ->json();
         }elseif($table=='view_trip'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('lotid'),
                    Field::inst('prod_date'),
                    Field::inst('prod_shift'),
                    Field::inst('shop'),
                    Field::inst('trip'),
                    Field::inst('minlift'),
                    Field::inst('maxlift'),
                    Field::inst('plan'),
                    Field::inst('scan'),
                    Field::inst('remain'),
                    Field::inst('shipping_time')
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_history_sps'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('sps_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('idseat')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('setting_time')->validator( 'Validate::notEmpty' ),
                    Field::inst('qty_lifting')->validator( 'Validate::notEmpty' ),
                    Field::inst('id_print'),
                    Field::inst('lifting_set')

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        
        }elseif($table=='temp_assy'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_hour')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('variant1')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant2')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant3')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant4')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('assy_start')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('assy_center1')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('assy_center2')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('seat_belt')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qc_start')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qc_center')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('takt_time')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('durasi')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null))
                    )
                    
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table, $values['qrcode'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table, $values['qrcode'],$nama);
             } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table, $values['qrcode'],$nama);
                    
            } )    
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_assy'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_shift')->validator( 'Validate::notEmpty' ),
                    Field::inst('prod_hour')->validator( 'Validate::notEmpty' ),
                    Field::inst('line_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('grade')->validator( 'Validate::notEmpty' ),
                    Field::inst('variant1')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant2')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant3')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('variant4')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('assy_start')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('assy_center1')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('assy_center2')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('seat_belt')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qc_start')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qc_center')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('takt_time')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('durasi')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

                )
            
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table, $values['qrcode'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table, $values['qrcode'],$nama);
             } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table, $values['qrcode'],$nama);
                    
            } )    
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
            
         }elseif($table=='tbl_minus_delivery'){
            Editor::inst( $this->editorDb, 'tbl_h_shipping')
                ->fields(
                    Field::inst('id'),
                    Field::inst('shop')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric')
                    ->validator(Validate::minNum(1))
                    ->validator(Validate::maxNum(2)),
                    Field::inst('jenis_trolley')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric'),
                    Field::inst('view')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric'),
                    Field::inst('view_coordinate')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric'),
                    Field::inst('trolley_temp')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric'),
                    Field::inst('trolley_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('tampak')->validator( 'Validate::notEmpty' ),
                    Field::inst('lantai')->validator( 'Validate::notEmpty' ),
                    Field::inst('kolom')->validator( 'Validate::notEmpty' ),
                    Field::inst('item_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('code')->validator( 'Validate::notEmpty' ),
                    Field::inst('urutan')
                    ->validator('Validate::notEmpty')
                    ->validator('Validate::numeric'),
                    Field::inst('lotid')->validator( 'Validate::notEmpty'),
                    Field::inst('trip')->validator( 'Validate::notEmpty'),
                    Field::inst('sliporder')->validator( 'Validate::notEmpty'),
                    Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                    Field::inst('idseat')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('suffix')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('trolley_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('qr_trolley')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('qr_seat')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('scan_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                     $editor->where( function ( $q ) {
                            $q->where('part_no',null,'!=');
                            $q->where('qr_seat', null);
                            $q->where('status', 'Minus');
                        });
                      
                } ) 
             ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table,$id, $values['lifting_no'].$values['suffix'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table,$id, $values['lifting_no'].$values['suffix'],$nama);
             } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table,0, $values['lifting_no'].$values['suffix'],$nama);
                    
            } )   
            ->process( $post )
            ->json();
         }elseif($table=='tbl_temp_shipping'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('shop')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric')
                ->validator(Validate::minNum(1))
                ->validator(Validate::maxNum(2)),
                Field::inst('jenis_trolley')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric'),
                Field::inst('view')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric'),
                Field::inst('view_coordinate')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric'),
                Field::inst('trolley_temp')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric'),
                Field::inst('trolley_name')->validator( 'Validate::notEmpty' ),
                Field::inst('tampak')->validator( 'Validate::notEmpty' ),
                Field::inst('lantai')->validator( 'Validate::notEmpty' ),
                Field::inst('kolom')->validator( 'Validate::notEmpty' ),
                Field::inst('item_code')->validator( 'Validate::notEmpty' ),
                Field::inst('code')->validator( 'Validate::notEmpty' ),
                Field::inst('urutan')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric'),
                Field::inst('lotid')->validator( 'Validate::notEmpty'),
                Field::inst('trip')->validator( 'Validate::notEmpty'),
                Field::inst('sliporder')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('idseat')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('suffix')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('part_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('trolley_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_trolley')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_seat')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('scan_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_shipping'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('shop')->validator( 'Validate::notEmpty'),
                Field::inst('sliporder')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')
                ->getFormatter('Format::toUpperCase')
                ->setFormatter('Format::toUpperCase')
                ->validator( 'Validate::notEmpty'),
                Field::inst('vin')->validator( 'Validate::notEmpty'),
                Field::inst('model')->validator( 'Validate::notEmpty'),
                Field::inst('grade')->validator( 'Validate::notEmpty'),
                Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                Field::inst('side')->validator( 'Validate::notEmpty'),
                Field::inst('code')->validator( 'Validate::notEmpty'),
                Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('part_no')->validator( 'Validate::notEmpty'),                
                Field::inst('job_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('shipping_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('shipping_id')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('trip')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('basepallet')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('urutan')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('code_plc')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_seat')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_basepallet')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('status_seat')->setFormatter( Format::ifEmpty(null) )
                ->validator( Validate::values( array('OK', 'NG'), ValidateOptions::inst()
                 ->message( 'Please input OK or NG') ) ),
                Field::inst('location')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
         }elseif($table=='prod_regular'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('model')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')
                ->getFormatter('Format::toUpperCase')
                ->setFormatter('Format::toUpperCase')
                ->validator( 'Validate::notEmpty'),
                Field::inst('grade')->validator( 'Validate::notEmpty'),
                Field::inst('variant1')->validator( 'Validate::notEmpty'),
                Field::inst('variant2')->validator( 'Validate::notEmpty'),
                Field::inst('variant3')->validator( 'Validate::notEmpty'),
                Field::inst('variant4')->validator( 'Validate::notEmpty'),
                Field::inst('description')->validator( 'Validate::notEmpty'),
                Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                Field::inst('side')->validator( 'Validate::notEmpty'),
                Field::inst('code')->validator( 'Validate::notEmpty'),
                Field::inst('line_no')->validator( 'Validate::notEmpty'),
                Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('part_no')->validator( 'Validate::notEmpty'),                
                Field::inst('job_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('airbag')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qrcode')->validator( 'Validate::notEmpty')->validator( 'Validate::unique' ),
                Field::inst('create_date')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('label_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_small')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_big1')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_big2')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_big3')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sps_big4')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy1')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy2')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy3')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy4')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy5')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('assy_start')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                      
                } )
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table, $values['qrcode'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table,$values['qrcode'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table, $values['qrcode'],$nama);
                    
            } )     
            ->process( $post )
            ->json();
         }elseif($table=='data_shipping'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('prod_date')->validator( 'Validate::notEmpty'),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('shop')->validator( 'Validate::notEmpty'),
                Field::inst('sliporder')->validator( 'Validate::notEmpty'),
                Field::inst('lifting_no')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')
                ->getFormatter('Format::toUpperCase')
                ->setFormatter('Format::toUpperCase')
                ->validator( 'Validate::notEmpty'),
                Field::inst('vin')->validator( 'Validate::notEmpty'),
                Field::inst('model')->validator( 'Validate::notEmpty'),
                Field::inst('grade')->validator( 'Validate::notEmpty'),
                Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                Field::inst('side')->validator( 'Validate::notEmpty'),
                Field::inst('code')->validator( 'Validate::notEmpty'),
                Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('part_no')->validator( 'Validate::notEmpty'),                
                Field::inst('job_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('shipping_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('shipping_id')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('trip')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('basepallet')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('urutan')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('code_plc')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_seat')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('qr_basepallet')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('status_seat')->setFormatter( Format::ifEmpty(null) )
                ->validator( Validate::values( array('OK', 'NG'), ValidateOptions::inst()
                 ->message( 'Please input OK or NG') ) ),
                Field::inst('location')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                
            )
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='view_lifting_sps'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('lifting_no'),
                    Field::inst('suffix'),
                    Field::inst('grade'),
                    Field::inst('model'),
                    Field::inst('prod_date'),
                    Field::inst('prod_shift'),
                    Field::inst('line_no')
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='view_mon_plc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('area'),
                    Field::inst('line'),
                    Field::inst('pos'),
                    Field::inst('deskripsi'),
                    Field::inst('ip_address'),
                    Field::inst('port'),
                    Field::inst('status'),
                    Field::inst('put_date'),
                    Field::inst('send_date'),
                    Field::inst('feedback_date'),
                    Field::inst('id_transaksi'),
                    Field::inst('reg_Send1'),
                    Field::inst('send1'),
                    Field::inst('reg_Send2'),
                    Field::inst('send2'),
                    Field::inst('reg_Send3'),
                    Field::inst('send3'),
                    Field::inst('reg_Send4'),
                    Field::inst('send4'),
                    Field::inst('reg_rec1'),
                    Field::inst('rec1'),
                    Field::inst('reg_rec2'),
                    Field::inst('rec2'),
                    Field::inst('reg_rec3'),
                    Field::inst('rec3'),
                    Field::inst('reg_rec4'),
                    Field::inst('rec4')
                )            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='temp_posting'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_posting')
                    ->options(
                            Options::inst()
                                ->table('tbl_pos')
                                ->value('pos_level')
                                ->label('pos_level')
                                ->where( function ($q) use ($user_level) {
                                        $q->where( 'pos_level', '%POSTING%','like');
                                        $q->where( 'user_level', 'SPS');
                                })
                        ),
                    Field::inst('controller_no'),
                    Field::inst('child_part_no'),
                    Field::inst('child_part_name'),
                    Field::inst('supplier'),
                    Field::inst('qr_supplier'),
                    Field::inst('rack_no'),
                    Field::inst('posting_no'),
                    Field::inst('gate')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('qty_pack'),
                    Field::inst('scan_date'),
                    Field::inst('posting_date')->setFormatter( Format::ifEmpty(null) )
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_posting'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_posting'),
                    Field::inst('controller_no'),
                    Field::inst('child_part_no'),
                    Field::inst('child_part_name'),
                    Field::inst('supplier'),
                    Field::inst('qr_supplier'),
                    Field::inst('rack_no'),
                    Field::inst('posting_no'),
                    Field::inst('qty_pack'),
                    Field::inst('scan_date'),
                    Field::inst('posting_date')
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
         }elseif($table=='tbl_h_repair'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('model')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('seat_code')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('side')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('process_rm')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qc_rm')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_mis_posting'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('posting_date'),
                    Field::inst('category'),
                    Field::inst('pos_posting'),
                    Field::inst('true_child_part_no'),
                    Field::inst('true_rack_no'),
                    Field::inst('true_picking_no'),
                    Field::inst('false_child_part_no'),
                    Field::inst('false_rack_no'),
                    Field::inst('false_picking_no'),
                    Field::inst('leader_confirm')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('problem')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('problem_date')->setFormatter( Format::ifEmpty(null))

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_stock_cokotei'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('controller_no')->validator( 'Validate::notEmpty' )
                    ->options(
                        Options::inst()
                            ->table('tbl_m_controller')
                            ->value('controller_no')
                            ->label('controller_no')
                            ->where( function ($q) use ($user_level) {
                                    $q->where( 'pos_level', 'COKOTEI');
                            })
                    ),
                    Field::inst('picking_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('address')->validator( 'Validate::notEmpty' ),
                    Field::inst('position')->validator( 'Validate::notEmpty' ),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_date')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('age')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('color')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_stock_dokatei'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_in')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('age')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_out')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_stock_scrap'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('model')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_in')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_out')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
        } elseif ($table == 'tbl_mis_conf') {
            Editor::inst($this->editorDb, 'tbl_mis_posting')
                ->fields(
                    Field::inst('id'),
                    Field::inst('posting_date'),
                    Field::inst('category'),
                    Field::inst('pos_posting'),
                    Field::inst('true_child_part_no'),
                    Field::inst('true_rack_no'),
                    Field::inst('true_picking_no'),
                    Field::inst('false_child_part_no'),
                    Field::inst('false_rack_no'),
                    Field::inst('false_picking_no'),
                    Field::inst('leader_confirm')->set(true)->setValue($nama),
                    Field::inst('problem')->validator('Validate::notEmpty'),
                    Field::inst('problem_date')->set(true)->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7))
                )
                ->on('preGet', function ($editor, $id) use ($user_level, $field, $value) {
                    $editor->where(function ($q) use ($user_level, $field, $value) {
                        if ($field) {
                            $val_t = explode(',,', $value);
                            $fie_t = explode(',,', $field);
                            $ex_x = count($val_t);
                            for ($i = 0; $i < $ex_x; $i++) {
                                $ex = explode('|', $val_t[$i]);
                                if($ex[0]=='null' and $ex[1]=='='){
                                     $q->where($fie_t[$i], null);
                                }else{
                                    if ($ex[1] == 'IN') {
                                        $q->where($fie_t[$i], $ex[0], $ex[1], false);
                                    } else {
                                        $q->where($fie_t[$i], $ex[0], $ex[1]);
                                    }
                                }
                                
                            }
                        }
                         $q->where('category', 'Mis Posting');
                         $q->where('problem_date', null);
                    });
                })
                ->process($post)
                ->json();
        }elseif($table=='tbl_stock_spssmall'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_posting')
                    ->options(
                            Options::inst()
                                ->table('tbl_pos')
                                ->value('pos_level')
                                ->label('pos_level')
                                ->where( function ($q) use ($user_level) {
                                        $q->where( 'pos_level', '%POSTING%','like');
                                        $q->where( 'user_level', 'SPS');
                                })
                        ),
                    Field::inst('rack_no'),
                    Field::inst('controller_no'),
                    Field::inst('posting_no'),
                    Field::inst('gate')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('child_part_no'),
                    Field::inst('child_part_name'),
                    Field::inst('supplier'),
                    Field::inst('qty_pack'),
                    Field::inst('min1'),
                    Field::inst('min2'),
                    Field::inst('normal'),
                    Field::inst('over'),
                    Field::inst('prod_hour'),
                    Field::inst('stock'),
                    Field::inst('color'),
                    Field::inst('last_update_in')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('last_update_out')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }

                        });
                     }
                } )    
            ->process( $post )
            ->json();
       
        }elseif($table=='temp_plc' OR $table=='tbl_h_plc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('ip_address')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('station_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('plc_name')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('pos')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('tipe_data')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('keyjss')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg1')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg2')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg3')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg4')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg5')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg6')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data1')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data2')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data3')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data4')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data5')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data6')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('put')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('send')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('finish')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null) )
                )
            
           ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table,$values['pos'].'|'.$values['keyjss'],$nama);
            } )  
            ->on('preGet', function ($editor, $id) use ($user_level, $field, $value) {
                    $editor->where(function ($q) use ($user_level, $field, $value) {
                        if ($field) {
                            $val_t = explode(',,', $value);
                            $fie_t = explode(',,', $field);
                            $ex_x = count($val_t);
                            for ($i = 0; $i < $ex_x; $i++) {
                                $ex = explode('|', $val_t[$i]);
                                if ($ex[0] == 'null' and $ex[1] == '=') {
                                    $q->where($fie_t[$i], null);
                                } else {
                                    if ($ex[1] == 'IN') {
                                        $q->where($fie_t[$i], $ex[0], $ex[1], false);
                                    } else {
                                        $q->where($fie_t[$i], $ex[0], $ex[1]);
                                    }
                                }
                            }
                        }
                    });
                })

                ->process($post)
                ->json();
        }elseif($table=='tbl_h_tightenning'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('serial_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('lifting_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('cycle_count')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('pos_assy')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('counter_tict')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('torque')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('input_date')->setFormatter( Format::ifEmpty(null) )
                )
            
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table,$values['pos'].'|'.$values['lifting_no'].'|'.$values['serial_no'],$nama);
            } ) 
            ->on('preGet', function ($editor, $id) use ($user_level, $field, $value) {
                    $editor->where(function ($q) use ($user_level, $field, $value) {
                        if ($field) {
                            $val_t = explode(',,', $value);
                            $fie_t = explode(',,', $field);
                            $ex_x = count($val_t);
                            for ($i = 0; $i < $ex_x; $i++) {
                                $ex = explode('|', $val_t[$i]);
                                if ($ex[0] == 'null' and $ex[1] == '=') {
                                    $q->where($fie_t[$i], null);
                                } else {
                                    if ($ex[1] == 'IN') {
                                        $q->where($fie_t[$i], $ex[0], $ex[1], false);
                                    } else {
                                        $q->where($fie_t[$i], $ex[0], $ex[1]);
                                    }
                                }
                            }
                        }
                    });
                })

                ->process($post)
                ->json();
        }elseif($table=='tbl_eff_hour'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('prod_shift')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('prod_hour')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('line_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('problem_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('problem_detail')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('plan_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('rest_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('work_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('takt_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('planning')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('target')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('ok')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('ng')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('eff')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_eff_line'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('prod_shift')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('line_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('model')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('lifting_no')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('takt_time')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('target')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('start_target')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('plan')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('start_plan')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('stop')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('start_work')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('status_date')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('delay_date')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('update_by')->set(true)->setValue($nama),
                    Field::inst('update_time')->set(true)->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_plc_storage'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos')->validator( 'Validate::notEmpty' ),
                    Field::inst('shipping_id')->validator( 'Validate::notEmpty' ),
                    Field::inst('trip')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('basepallet')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('lifting1')->validator( 'Validate::notEmpty' ),
                    Field::inst('lifting2')->validator( 'Validate::notEmpty' ),
                    Field::inst('code_plc')->validator( 'Validate::notEmpty' ),
                    Field::inst('status')->validator( 'Validate::notEmpty' ),
                    Field::inst('start_time')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('finish_time')->setFormatter( Format::ifEmpty(null))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_cokotei'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('controller_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('picking_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('category')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('remark')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('address')->validator( 'Validate::notEmpty' ),
                    Field::inst('position')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix_master')->validator( 'Validate::notEmpty' ),
                    Field::inst('scan_date')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('finish_date')->setFormatter( Format::ifEmpty(null))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();

        }elseif($table=='temp_cokotei'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('controller_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('picking_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('category')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('remark')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('address')->validator( 'Validate::notEmpty' ),
                    Field::inst('position')->validator( 'Validate::notEmpty' ),
                    Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                    Field::inst('side')->validator( 'Validate::notEmpty' ),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('suffix_master')->validator( 'Validate::notEmpty' ),
                    Field::inst('qrcode')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_date')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('finish_date')->setFormatter( Format::ifEmpty(null))
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_airbag'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('scan_time')->validator( 'Validate::notEmpty' ),
                    Field::inst('pos_level')->validator( 'Validate::notEmpty' ),
                    Field::inst('qr_seat')->validator( 'Validate::notEmpty' ),
                    Field::inst('qr_airbag')->setFormatter( Format::ifEmpty(null)) 
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_labelprod'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('pos_level')->validator( 'Validate::notEmpty' ),
                    Field::inst('qr_seat')->validator( 'Validate::notEmpty' ),
                    Field::inst('print_time')->setFormatter( Format::ifEmpty(null)),
                    Field::inst('scan_time')->setFormatter( Format::ifEmpty(null)) 
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                     if($user_level!='Administrator'){
                        $editor->where( function ( $q ) use ($field,$value) {
                            if(!empty($field)){
                                    $val_t=explode(',',$value);
                                    $fie_t=explode(',',$field);
                                    $ex_x=count($val_t);
                                    for($i=0; $i<$ex_x; $i++){
                                        $ex=explode('|',$val_t[$i]);
                                        if(!empty($ex[1])){
                                            $q->where($fie_t[$i], $ex[0],$ex[1]);
                                        }else{
                                            $q->where($fie_t[$i], $ex[0]);
                                        }
                                    }
                                }
                                

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_temp_shoot'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date'),
                    Field::inst('lifting_no'),
                    Field::inst('ip_address'),
                    Field::inst('port'),
                    Field::inst('line'),
                    Field::inst('pos'),
                    Field::inst('part_no'),
                    Field::inst('position'),
                    Field::inst('std_tightening'),
                    Field::inst('act_tightening')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('reg_counter'),
                    Field::inst('reg_tightening'),
                    Field::inst('reg_result'),
                    Field::inst('status')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('last_update')->setFormatter( Format::ifEmpty(null) ),
                    Field::inst('data_time')->setFormatter( Format::ifEmpty(null) )
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_h_shoot'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('prod_date'),
                    Field::inst('lifting_no'),
                    Field::inst('ip_address'),
                    Field::inst('port'),
                    Field::inst('line'),
                    Field::inst('pos'),
                    Field::inst('part_no'),
                    Field::inst('position'),
                    Field::inst('std_tightening'),
                    Field::inst('act_tightening'),
                    Field::inst('reg_counter'),
                    Field::inst('reg_tightening'),
                    Field::inst('reg_result'),
                    Field::inst('status'),
                    Field::inst('last_update')
                )
            
             
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                     if($user_level!='Administrator' and !empty($field)){
                        $editor->where( function ( $q ) use($field,$value) {

                            $q->where($field, $value,'!=');

                        });
                     }
                      
                } )    
            ->process( $post )
            ->json();
        }
    }
    
    function logdate ($action,$values,$nama){
        $this->load->library('user_agent');
        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        $dc=$agent.$this->agent->platform().$this->input->ip_address();
         $data=array(
            'action'=>$action,
            'data'=>$values,
            'device'=>$dc,
            'update_by'=>$nama,
            'update_time'=>gmdate('Y-m-d H:i:s',time()+60*60*7)
            );
        $this->db->insert('tbl_logdate',$data);

    }
    
}