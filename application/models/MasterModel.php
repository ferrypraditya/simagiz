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

class MasterModel extends CI_Model
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

        if($table=='tbl_m_paket_makan'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_paket')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
                Field::inst('nama_paket')->validator( 'Validate::notEmpty' ),
                Field::inst('foto_paket')->validator( 'Validate::notEmpty' ),
                Field::inst('standar_packing')->validator( 'Validate::numeric' )->setFormatter( Format::ifEmpty(0) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            ) 
            ->on( 'preEdit', function ( $editor, $id, $values) {
                
               $data3 = array(                                                      
                "takt_time"=>$values['takt_time'],
               );
                $this->db->update('tbl_eff_line',$data3,array('line_no'=>$values['line_no'],'prod_date'=>gmdate('Y-m-d',time()+60*60*7)));      
               
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
        }elseif($table=='tbl_m_menu_makanan'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_menu')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
                Field::inst('nama_menu')->validator( 'Validate::notEmpty' ),
                Field::inst('cara_memasak')->validator( 'Validate::notEmpty' ),
				Field::inst('foto_masak')
                ->upload(
                        Upload::inst('./gambar/childpart/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'child',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
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
        }elseif($table=='tbl_m_resep_makanan'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_menu')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
                Field::inst('qty_menu')->validator( 'Validate::notEmpty' ),
                Field::inst('bahan_baku')->validator( 'Validate::notEmpty' ),
                Field::inst('qty_bahan')->validator( 'Validate::notEmpty' ),
                Field::inst('satuan')->validator( 'Validate::notEmpty' ),
                Field::inst('proses_prepare')->validator( 'Validate::notEmpty' ),
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
        }elseif($table=='tbl_m_dapur'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_dapur')->validator( 'Validate::notEmpty' ),
                Field::inst('nama_dapur')->validator( 'Validate::notEmpty' ),
                Field::inst('provinsi')->validator( 'Validate::notEmpty' ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = implode('-', array_slice(explode('-',$values['child_part_no']), 0, 2)). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/childpart/';
                       $newDir = FCPATH . 'gambar/childpart/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_spssmall set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){

                       $replace = implode('-', array_slice(explode('-',$values['child_part_no']), 0, 2)). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/childpart/';
                       $newDir = FCPATH . 'gambar/childpart/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_spssmall set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
               })         
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_stock_spssmall (pos_posting,rack_no,controller_no,posting_no,gate,child_part_no,child_part_name,supplier,qty_pack,min1,min2,normal,over,prod_hour) SELECT a.pos_posting,a.rack_no,c.controller_no,a.posting_no,a.gate,a.child_part_no,a.child_part_name,a.supplier,a.qty_pack,a.min1,a.min2,a.normal,a.over,a.prod_hour FROM tbl_m_spssmall a LEFT JOIN tbl_stock_spssmall b ON(a.pos_posting=b.pos_posting and a.child_part_no=b.child_part_no) left join tbl_m_controller c on(a.pos_posting=c.pos_level) WHERE b.id is null order by a.id");
                $this->db->query("UPDATE tbl_stock_spssmall A, tbl_m_spssmall B set A.rack_no=B.rack_no,A.supplier=B.supplier,A.qty_pack=B.qty_pack,A.min1=B.min1,A.min2=B.min2,A.normal=B.normal,A.over=B.over,A.prod_hour=B.prod_hour,A.gate=B.gate WHERE A.pos_posting=B.pos_posting and A.child_part_no=B.child_part_no and A.posting_no=B.posting_no");
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
        }elseif($table=='tbl_m_sekolah'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_sekolah')->validator( 'Validate::notEmpty' ),
                Field::inst('nama_sekolah')->validator( 'Validate::notEmpty' ),
                Field::inst('provinsi')->validator( 'Validate::notEmpty' ),
                Field::inst('alamat')->validator( 'Validate::notEmpty' ),
                Field::inst('jumlah_murid')->setFormatter( Format::ifEmpty(1) ),
                Field::inst('kode_dapur')->validator( 'Validate::notEmpty' ),
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
        }elseif($table=='tbl_m_matrix_menu'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('kode_paket')
                 ->options( Options::inst()
                        ->table( 'tbl_m_paket_makan')
                        ->value( 'kode_paket' )
                        ->label( 'kode_paket' )
                        
                    )
                ->validator( 'Validate::notEmpty' ),
                Field::inst('kode_menu')->validator( 'Validate::notEmpty' )
                 ->options(
                            Options::inst()
                                ->table('tbl_m_menu_makanan')
                                ->value('kode_menu')
                                ->label('kode_menu')
                        ),
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
        }elseif($table=='tbl_m_controller'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos_level')->validator( 'Validate::notEmpty' )
                 ->options(
                        Options::inst()
                            ->table('tbl_pos')
                            ->value('pos_level')
                            ->label('pos_level')
                            ->where( function ($q) use ($user_level) {
                                    $q->where( 'user_level', 'SPS');
                            })
                    ),
                Field::inst('controller_no')->validator( 'Validate::notEmpty' ),
                Field::inst('ip_no')->validator( 'Validate::notEmpty' ),
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
        }elseif($table=='tbl_m_boxpicking'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos_picking')->validator( 'Validate::notEmpty' )
                 ->options(
                        Options::inst()
                            ->table('tbl_pos')
                            ->value('pos_level')
                            ->label('pos_level')
                            ->where( function ($q) use ($user_level) {
                                $q->where( 'user_level', 'SPS');
                                $q->where( 'pos_level', '%SMALL%','like');
                            })
                    ),
                Field::inst('image_box')
                 ->upload(
                        Upload::inst('./gambar/picking/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'boxp',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('min_box_no')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_box_no')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_box']), 1)->row();
                   if(!empty($qf)){
                       $replace = $values['pos_picking']. '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_box']));
                       $oldDir = FCPATH . 'gambar/picking/';
                       $newDir = FCPATH . 'gambar/picking/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_boxpicking set image_box=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_box']), 1)->row();
                   if(!empty($qf)){
                       $replace = $values['pos_picking']. '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_box']));
                       $oldDir = FCPATH . 'gambar/picking/';
                       $newDir = FCPATH . 'gambar/picking/';
                        if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_boxpicking set image_box=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                  $this->db->query("DELETE FROM tbl_view_box WHERE pos_picking='".$values['pos_picking']."' and box_no>'".$values['max_box_no']."'");
               })     
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_m_boxpicking (pos_picking,min_box_no,max_box_no) SELECT a.pos_level,1,10 FROM tbl_pos a LEFT JOIN tbl_m_boxpicking b ON(a.pos_level=b.pos_picking) WHERE a.user_level='SPS' and a.pos_level like '%SMALL%' and b.id is null order by a.id");

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
        }elseif($table=='tbl_view_box'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos_picking')->validator( 'Validate::notEmpty' )
                 ->options(
                        Options::inst()
                            ->table('tbl_pos')
                            ->value('pos_level')
                            ->label('pos_level')
                            ->where( function ($q) use ($user_level) {
                                $q->where( 'user_level', 'SPS');
                                $q->where( 'pos_level', '%SMALL%','like');
                            })
                    ),
                Field::inst('box_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('col')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('row')->setFormatter( Format::ifEmpty(0) ),
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
        }elseif($table=='tbl_m_sop'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('line_no')->validator( 'Validate::notEmpty' )
                 ->options(
                        Options::inst()
                            ->table('tbl_m_line')
                            ->value('line_no')
                            ->label('line_no')
                    ),
                Field::inst('model')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('seat')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('part_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('sub_assy1')
                 ->upload(
                        Upload::inst('./gambar/sub_assy1/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'sub_assy1',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('sub_assy2')
                 ->upload(
                        Upload::inst('./gambar/sub_assy2/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'sub_assy2',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('sub_assy3')
                 ->upload(
                        Upload::inst('./gambar/sub_assy3/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'sub_assy3',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('sub_assy4')
                 ->upload(
                        Upload::inst('./gambar/sub_assy4/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'sub_assy4',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('sub_assy5')
                 ->upload(
                        Upload::inst('./gambar/sub_assy5/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'sub_assy5',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('assy_start')
                 ->upload(
                        Upload::inst('./gambar/assy_start/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'assy_start',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('assy_center1')
                 ->upload(
                        Upload::inst('./gambar/assy_center1/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'assy_center1',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('assy_center2')
                 ->upload(
                        Upload::inst('./gambar/assy_center2/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'assy_center2',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('qc_start')
                 ->upload(
                        Upload::inst('./gambar/qc_start/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'qc_start',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('qc_center')
                 ->upload(
                        Upload::inst('./gambar/qc_center/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'qc_center',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy1']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['sub_assy1']));
                       $oldDir = FCPATH . 'gambar/sub_assy1/';
                       $newDir = FCPATH . 'gambar/sub_assy1/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy1=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy1']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/sub_assy1/';
                       $newDir = FCPATH . 'gambar/sub_assy1/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy1=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy2']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/sub_assy2/';
                       $newDir = FCPATH . 'gambar/sub_assy2/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy2=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy3']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/sub_assy3/';
                       $newDir = FCPATH . 'gambar/sub_assy3/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy3=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy4']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/sub_assy4/';
                       $newDir = FCPATH . 'gambar/sub_assy4/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy4=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['sub_assy5']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/sub_assy5/';
                       $newDir = FCPATH . 'gambar/sub_assy5/';
                        if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set sub_assy5=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['assy_start']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/assy_start/';
                       $newDir = FCPATH . 'gambar/assy_start/';
                        if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set assy_start=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['assy_center1']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/assy_center1/';
                       $newDir = FCPATH . 'gambar/assy_center1/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set assy_center1=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['assy_center2']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/assy_center2/';
                       $newDir = FCPATH . 'gambar/assy_center2/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set assy_center2=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['qc_start']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/qc_start/';
                       $newDir = FCPATH . 'gambar/qc_start/';
                        if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_sop set qc_start=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['qc_center']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $qf->id));
                       $oldDir = FCPATH . 'gambar/qc_center/';
                       $newDir = FCPATH . 'gambar/qc_center/';
                      if(file_exists($oldDir . $qf->filename)){
                        rename($oldDir . $qf->filename, $newDir . $replace);
                      }else{
                        $this->db->query("UPDATE tbl_m_sop set qc_center=null WHERE id='".$id."'");
                        $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                      }
                   }

               })     
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_m_sop (line_no,model,seat,part_no) SELECT a.line_no,a.model,CONCAT(a.seat_code,' ',a.side),substr(a.part_no, 1,11) FROM tbl_m_seat a LEFT JOIN tbl_m_sop b ON(substr(a.part_no, 1,11)=b.part_no) WHERE a.status='Active' and b.id is null group by substr(a.part_no,1, 11) order by a.id");

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
        }elseif($table=='tbl_m_childpart'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('child_part_name')->validator( 'Validate::notEmpty' ),
                Field::inst('qty_box')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('image_part')
                 ->upload(
                        Upload::inst('./gambar/childpart/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'CHILD',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('min_stock')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_stock')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['child_part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/childpart/';
                       $newDir = FCPATH . 'gambar/childpart/';
                       rename($oldDir . $qf->filename, $newDir . $replace);
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['child_part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/childpart/';
                       $newDir = FCPATH . 'gambar/childpart/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_childpart set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
               })     
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
        }elseif($table=='tbl_m_pattern'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('shop')->validator( 'Validate::notEmpty' ),
                Field::inst('seat_code')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('side')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('temp_lifting')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('temp_pallet')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('code_plc')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('status')
                ->validator( Validate::values( array('Active', 'Non Active'), ValidateOptions::inst()
                ->message( 'Please input Active or Non Active') ) ),
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
        }elseif($table=='tbl_m_matrixqcseat'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                Field::inst('side')->validator( 'Validate::notEmpty' ),
                Field::inst('code')->validator( 'Validate::notEmpty' ),
                Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('problem_no')->setFormatter( Format::ifEmpty(1) ),
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
        }elseif($table=='tbl_m_problemchild'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('child_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('child_part_name')->validator( 'Validate::notEmpty' ),
                Field::inst('problem')->validator( 'Validate::notEmpty' ),
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
         }elseif($table=='tbl_m_partqc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('seat_code')->validator( 'Validate::notEmpty' ),
                Field::inst('side')->validator( 'Validate::notEmpty' ),
                Field::inst('code')->validator( 'Validate::notEmpty' ),
                Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('image_part')
                 ->upload(
                        Upload::inst('./gambar/qc_center/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'problem_no',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),   
                Field::inst('min_problem_no')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_problem_no')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['seat_part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/qc_center/';
                       $newDir = FCPATH . 'gambar/qc_center/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_partqc set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['seat_part_no'],0,11). '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/qc_center/';
                       $newDir = FCPATH . 'gambar/qc_center/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_partqc set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
              
                    $this->db->query("DELETE FROM tbl_view_partqc WHERE seat_part_no='".$values['seat_part_no']."' and problem_no>'".$values['max_problem_no']."'");
               })     
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_m_partqc (seat_code,side,code,seat_part_no,min_problem_no,max_problem_no) SELECT a.seat_code,a.side,a.code,substr(a.part_no,1, 11),1,10 FROM tbl_m_seat a LEFT JOIN tbl_m_partqc b ON(substr(a.part_no,1, 11)=b.seat_part_no) WHERE a.status='Active' and b.id is null group by substr(a.part_no,1, 11) order by a.id");
                $this->db->query("UPDATE tbl_m_partqc A, tbl_m_sop B set A.image_part=B.qc_center WHERE A.seat_part_no=B.part_no AND A.image_part is null");
                $this->db->query("UPDATE tbl_m_sop A, tbl_m_partqc B set A.qc_center=B.image_part WHERE A.part_no=B.seat_part_no AND A.qc_center is null");
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
        }elseif($table=='tbl_m_problemno'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('problem_no')->validator( 'Validate::notEmpty' ),
                Field::inst('image_part')
                 ->upload(
                        Upload::inst('./gambar/problem_no/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'problem_no',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on('postCreate', function ($editor, $id, &$values, &$row) {

                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['seat_part_no'],0,11).'_'.$values['problem_no']. '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/problem_no/';
                       $newDir = FCPATH . 'gambar/problem_no/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_problemno set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image_part']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['seat_part_no'],0,11).'_'.$values['problem_no']. '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image_part']));
                       $oldDir = FCPATH . 'gambar/problem_no/';
                       $newDir = FCPATH . 'gambar/problem_no/';
                       if(file_exists($oldDir . $qf->filename)){
                            rename($oldDir . $qf->filename, $newDir . $replace);
                        }else{
                            $this->db->query("UPDATE tbl_m_problemno set image_part=null WHERE id='".$id."'");
                            $this->db->query("DELETE FROM files WHERE id='".$qf->id."'");
                        }
                   }
               })     
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_m_problemno (seat_part_no,problem_no) SELECT a.seat_part_no,a.problem_no FROM tbl_view_partqc a LEFT JOIN tbl_m_problemno b ON(a.seat_part_no=b.seat_part_no and a.problem_no=b.problem_no) WHERE b.id is null group by a.seat_part_no,a.problem_no order by a.seat_part_no,a.problem_no");
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
        }elseif($table=='tbl_view_partqc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('seat_part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('problem_no')->validator( 'Validate::notEmpty' ),
                Field::inst('col')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('row')->setFormatter( Format::ifEmpty(null) ),
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
        }elseif($table=='tbl_m_basepallet'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('basepallet_no')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
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
        }elseif($table=='tbl_master_wiptrip'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('shop')->validator( 'Validate::notEmpty' ),
                Field::inst('wiptrip')->validator( 'Validate::notEmpty' ),
                Field::inst('status')->validator( 'Validate::notEmpty' ),
                 Field::inst('color')->validator( 'Validate::notEmpty' ),
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
        }elseif($table=='tbl_m_delay'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('problem')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
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
        
         }elseif($table=='tbl_m_patterntruck'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('shop')
                ->validator('Validate::notEmpty')
                ->validator('Validate::numeric')
                ->validator(Validate::minNum(1))
                ->validator(Validate::maxNum(2)),
                Field::inst('seat_code')
                ->validator('Validate::notEmpty')
                ->validator( Validate::values( array('FR', 'RR1', 'RR2'),ValidateOptions::inst()
                ->message( 'Please input FR,RR1,RR2') ) ),
                Field::inst('side')
                ->validator('Validate::notEmpty')
                ->validator( Validate::values( array('RH', 'LH', 'Bench'),ValidateOptions::inst()
                ->message( 'Please input RH,LH,Bench') ) ),
                Field::inst('lifting_no')
                ->validator('Validate::notEmpty'),
                Field::inst('basepallet')
                ->validator('Validate::notEmpty'),
                Field::inst('code_plc')
                ->validator( 'Validate::notEmpty' )
                ->validator('Validate::numeric'),
                 Field::inst('status')
                 ->validator( Validate::values( array('Active', 'Non Active'), ValidateOptions::inst()
                 ->message( 'Please input Active or Non Active') ) ),
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
        }elseif($table=='tbl_m_printer'){
            Editor::inst( $this->editorDb, $table)
                ->fields(                    
                Field::inst('id'),
                Field::inst('pos_level')
                ->options(
                        Options::inst()
                            ->table('tbl_pos')
                            ->value('pos_level')
                            ->label('pos_level')
                            ->where( function ($q) use ($user_level) {
                                $q->where( 'user_level', 'SPS');
                            })
                    ),
                Field::inst('remark')->validator( 'Validate::notEmpty' ),
                Field::inst('cap_tinta')->validator( 'Validate::notEmpty' ),       
                Field::inst('cap_kertas')->validator( 'Validate::notEmpty' ),
                Field::inst('cons_tinta')->validator( 'Validate::notEmpty' ),       
                Field::inst('cons_kertas')->validator( 'Validate::notEmpty' ),
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
        }elseif($table=='tbl_m_matrixplc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('model')->validator( 'Validate::notEmpty' ),
                Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('suffix_master')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('plc_code')->validator( 'Validate::notEmpty' ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
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
        }elseif($table=='tbl_m_matrixplcrm'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('model')->validator( 'Validate::notEmpty' ),
                Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                Field::inst('plc_code')->validator( 'Validate::notEmpty' ),
                Field::inst('jig_no')->validator( 'Validate::notEmpty' ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
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
        }elseif($table=='tbl_m_plc'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('ip_address')->validator( 'Validate::notEmpty' ),
                Field::inst('station_no')->validator( 'Validate::notEmpty' ),
                Field::inst('tipe_data')->validator( 'Validate::notEmpty' ),
                Field::inst('pos')->validator( 'Validate::notEmpty' )
                ->options(
                            Options::inst()
                                ->table('tbl_pos')
                                ->value('pos_level')
                                ->label('pos_level')
                                ->where( function ($q) use ($user_level) {
                                    $x="'SPS','ANDON'";
                                    $q->where("user_level","('SPS','AJS','ANDON')","NOT IN",false);
                                })
                        ),
                Field::inst('plc_name')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('nut_runner')
                ->validator( Validate::values( array('Yes', 'No'), ValidateOptions::inst()
                ->message( 'Please input Yes or No') ) ),
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
                Field::inst('status')
                 ->validator( Validate::values( array('Active', 'Non Active'), ValidateOptions::inst()
                ->message( 'Please input Active or Non Active') ) ),
                Field::inst('last_update')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
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
        }elseif($table=='tbl_m_nutrunner'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos')->validator( 'Validate::notEmpty' )
                ->options(
                            Options::inst()
                                ->table('tbl_pos')
                                ->value('pos_level')
                                ->label('pos_level')
                                ->where( function ($q) use ($user_level) {
                                    $x="'SPS','ANDON'";
                                    $q->where("user_level","('SPS','AJS','ANDON')","NOT IN",false);
                                })
                        ),
                Field::inst('serial_no')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('model')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('drawing')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('cycle_count')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_count1')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_count2')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max_count3')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('status')->setFormatter( Format::ifEmpty('RUNNING') ),
                Field::inst('last_update')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
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
        }elseif($table=='tbl_m_document'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('doc_name')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
                Field::inst('doc_no')->validator( 'Validate::notEmpty' ),
                Field::inst('revision')->validator( 'Validate::notEmpty' ),
                Field::inst('active_date')->validator( Validate::dateFormat(
                    'Y-m-d',ValidateOptions::inst()->allowEmpty( false )
                 ) )->validator( 'Validate::notEmpty' ),
                Field::inst('remark')->validator( 'Validate::notEmpty' ),
                Field::inst('adjust_date')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('seq_sj')->setFormatter( Format::ifEmpty(null) )->validator( 'Validate::numeric' ),
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
        }elseif($table=='tbl_master_nutrunner'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('ip_address'),
                Field::inst('port'),
                Field::inst('line'),
                Field::inst('pos'),
                Field::inst('pos_name'),
                Field::inst('tool_type'),
                Field::inst('serial_no'),
                Field::inst('last_calibrated'),
                Field::inst('std_counter'),
                Field::inst('act_counter'),
                Field::inst('reg_counter'),
                Field::inst('reg_tightening'),
                Field::inst('reg_result'),
                Field::inst('status'),
                Field::inst('last_connect'),
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
        }elseif($table=='tbl_master_parttightening'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('part_no')->validator('Validate::notEmpty')->validator('Validate::unique'),
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
        }elseif($table=='tbl_master_tightening'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos')
                ->validator('Validate::notEmpty'),
                Field::inst('part_no')
                ->validator('Validate::notEmpty')
                ->validator(function ($val, $data, $field, $host) {
                          $qusr = $this->db->query("SELECT * FROM tbl_master_parttightening WHERE part_no='" . $data['part_no'] . "' LIMIT 1")->row();                             
                            if(empty($qusr)){
                                return 'part_no must have registered in master part tightening';
                            }else{
                                return true;
                            }
                        }),
                Field::inst('part_name'),
                Field::inst('position')->validator('Validate::notEmpty'),
                Field::inst('std_tightening')->validator('Validate::notEmpty'),
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
        }elseif($table=='tbl_koordinat_tightening'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('pos')->validator('Validate::notEmpty'),
                Field::inst('part_no')->validator('Validate::notEmpty'),
                Field::inst('position')->validator('Validate::notEmpty'),
                Field::inst('image')
                ->upload(
                        Upload::inst('./gambar/logger/__NAME__')
                            ->db('files', 'id', array(
                                'filename'    => Upload::DB_FILE_NAME,
                                'remark'      => 'LOGGER',
                                'filesize'    => Upload::DB_FILE_SIZE,
                                'web_path'    => Upload::DB_WEB_PATH,
                                'system_path' => Upload::DB_SYSTEM_PATH
                            ))
                            ->validator(Validate::fileSize(1000000, 'Files must be smaller that 1MB'))
                            ->validator(Validate::fileExtensions(array('jpg'), "Please upload an image jpg"))
                    )
                ->setFormatter(Format::ifEmpty(null)),
                Field::inst('col')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('row')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on('postCreate', function ($editor, $id, &$values, &$row) {
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11).'_P'.$values['pos'] . '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image']));
                       $oldDir = FCPATH . 'gambar/logger/';
                       $newDir = FCPATH . 'gambar/logger/';
                       rename($oldDir . $qf->filename, $newDir . $replace);
                       $this->db->query("UPDATE tbl_koordinat_tightening set image='".$qf->id."',col=position,row='1' WHERE pos='".$values['pos']."' and part_no='".$values['part_no']."'");
                   }

                    
                })
                ->on('postEdit', function ($editor, $id, $values)  use($nama,$table){
                    //file values
                   $qf = $this->db->get_where('files', array('id' => $values['image']), 1)->row();
                   if(!empty($qf)){
                       $replace = substr($values['part_no'],0,11).'_P'.$values['pos'] . '.jpg';
                       $df = array(
                           'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                           'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                           'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                       );
                       $this->db->update('files', $df, array('id' => $values['image']));
                       $oldDir = FCPATH . 'gambar/logger/';
                       $newDir = FCPATH . 'gambar/logger/';
                       rename($oldDir . $qf->filename, $newDir . $replace);
                      
                       $this->db->query("UPDATE tbl_koordinat_tightening set image='".$qf->id."',col=position,row='1' WHERE pos='".$values['pos']."' and part_no='".$values['part_no']."'");
                   }
                  
               })     
            ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value){
                $this->db->query("INSERT INTO tbl_koordinat_tightening (pos,part_no,position,col,row) SELECT a.pos,a.part_no,a.position,a.position,'1' FROM tbl_master_tightening a LEFT JOIN tbl_koordinat_tightening b ON(a.pos=b.pos and a.part_no=b.part_no and a.position=b.position) WHERE b.part_no is null");

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
        }
    }
     
    
    //An additional method just to see if we can still use the Codeigniter database class (not required)
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
