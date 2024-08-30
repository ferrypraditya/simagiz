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
    
class SystemModel extends CI_Model 
{
    private $editorDb = null;
   
    //constructor which loads the CodeIgniter database class (not required)
    public function __construct()   {
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
        $username=$q->username; 
        $user_area=$q->user_area;
        $user_level=$q->user_level;
        $user_group=$q->user_group;
        $get_o=$this->db->get_where('tbl_menu_user',array('menuid'=>$menuid,'username'=>$username),1)->row();
        $field=$get_o->field_level;
        $value=$get_o->value_level;
        
        if($table=='tbl_title'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
            Field::inst( 'id' ),
                Field::inst( 'title' )
                 ->validator( 'Validate::unique' )
                 ->validator( 'Validate::notEmpty' ),
                Field::inst( 'detail' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'owner' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'address' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'tlp' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'email' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'version' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'year')
                ->validator( Validate::numeric() )
                ->setFormatter( Format::ifEmpty(null) ),
                Field::inst( 'image' )
                 ->upload( Upload::inst( './assets/img/__NAME__' )
                  ->db( 'files', 'id', array(
                      'filename'    => Upload::DB_FILE_NAME,
                      'remark'      =>'LOGO',
                      'filesize'    => Upload::DB_FILE_SIZE,
                      'web_path'    => Upload::DB_WEB_PATH,
                      'system_path' => Upload::DB_SYSTEM_PATH
                  ) )
                ->validator( Validate::fileSize( 500000, 'Files must be smaller that 500K' ) )
                ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg' ), "Please upload an image" ) )
                 ),
                 Field::inst( 'bg' )
                 ->upload( Upload::inst( './assets/img/__NAME__' )
                    ->db( 'files', 'id', array(
                        'filename'    => Upload::DB_FILE_NAME,
                        'remark'      =>'BG',
                        'filesize'    => Upload::DB_FILE_SIZE,
                        'web_path'    => Upload::DB_WEB_PATH,
                        'system_path' => Upload::DB_SYSTEM_PATH
                    ) )
                ->validator( Validate::fileSize( 1500000, 'Files must be smaller that 500K' ) )
                ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg' ), "Please upload an image" ) )
                 ),
                Field::inst( 'thema')
            )
          ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_group'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'user_group' )
                 ->validator( 'Validate::unique' )
                 ->validator( 'Validate::notEmpty' )
            )
            ->on( 'preEdit', function ( $editor, $id, $values) {
                $this->ChangeGroup('edit',$id, $values );
            } )
            ->on( 'preRemove', function ($editor, $id, $values ) {
                $this->ChangeGroup('delete',$id, $values );
            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
        }elseif($table=='tbl_area'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'user_area' )
                 ->validator( 'Validate::unique' )
                 ->validator( 'Validate::notEmpty' )
            )
            ->on( 'preEdit', function ( $editor, $id, $values) {
                $this->ChangeArea('edit',$id, $values );
            } )
            ->on( 'preRemove', function ($editor, $id, $values ) {
                $this->ChangeArea('delete',$id, $values );
            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
         }elseif($table=='tbl_shift'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'shift' )
                 ->validator( 'Validate::unique' )
                 ->validator( 'Validate::notEmpty' )
            )
            ->on( 'preEdit', function ( $editor, $id, $values) {
                $qu=$this->db->get_where('tbl_shift',array('id'=>$id),1)->row();

                if($values['shift']!=$qu->shift){
                    $da=array(
                      'shift'=>$values['shift']
                    );
                    $this->db->update('tbl_user',$da,array('shift'=>$qu->shift));
                }

            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
        }elseif($table=='tbl_level'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'user_level' )
                 ->validator( 'Validate::unique' )
                 ->validator( 'Validate::notEmpty' ),
                Field::inst( 'user_area' )
                  ->options( Options::inst()
                        ->table( 'tbl_area' )
                        ->value( 'user_area' )
                        ->label( 'user_area' )
                    ),
                Field::inst( 'user_group' )
                 ->options( Options::inst()
                        ->table( 'tbl_group' )
                        ->value( 'user_group' )
                        ->label( 'user_group' )
                    ),
                Field::inst( 'user_device' )
                ->validator( 'Validate::notEmpty' )
                ->validator( Validate::values( array('PC', 'Mobile','Tablet'), ValidateOptions::inst()
                ->message( 'Please input PC or Mobile or Tablet' ) ) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preEdit', function ( $editor, $id, $values)  use ($nama,$table) {
                $this->logdate('edit'.$table,$id.$values['user_level'], $nama);
                $this->Changelevel('edit',$id, $values );
            } )
            ->on( 'preRemove', function ($editor, $id, $values ) use ($nama,$table) {
                $this->logdate('remove'.$table,$id.$values['user_level'], $nama);
                $this->ChangeLevel('delete',$id, $values );
            } )
            ->on( 'postCreate', function (  $editor, $id, $values, $row ) use ($nama,$table) {
                $this->logdate('create'.$table,$id.$values['user_level'], $nama);
                 $this->ChangeLevel('create', '',$values );
            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
        }elseif($table=='tbl_pos'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                 Field::inst( 'id' ),
                 Field::inst( 'line_no' )
                ->options( Options::inst()
                        ->table( 'tbl_m_line' )
                        ->value( 'line_no' )
                        ->label( 'line_no' )
                    ),
                 Field::inst( 'user_level' )
                 ->options( Options::inst()
                        ->table( 'tbl_level')
                        ->value( 'user_level' )
                        ->label( 'user_level' )
                        ->where( function ($q) use ($user_level) {
                                $q->where( 'user_group', 'User');
                        })
                    ),
                Field::inst( 'pos_level' )
                 ->validator( 'Validate::notEmpty' ),              
                Field::inst( 'pos_name' )
                ->validator( 'Validate::notEmpty' ),
                Field::inst( 'lifting_order' )
                ->validator( Validate::values( array('Asc', 'Desc'), ValidateOptions::inst()
                ->message( 'Please input Asc or Desc' ) ) ),
                Field::inst( 'qty_lifting' )
                 ->validator( 'Validate::numeric' ),
                Field::inst( 'custome_variant') ->setFormatter( Format::ifEmpty(null) ),
                Field::inst( 'remark' )->setFormatter( Format::ifEmpty(null) ),
                Field::inst('min')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('max')->setFormatter( Format::ifEmpty(0) ),
                Field::inst('print')
                ->validator( Validate::values( array('No', 'Yes'), ValidateOptions::inst()
                ->message( 'Please input Yes or No' ) ) ),
                Field::inst( 'ip_no' )
                 ->setFormatter( Format::ifEmpty(null) )
                 ->validator( 'Validate::ip')
                 ->validator( 'Validate::unique' ),
                Field::inst( 'url') ->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
        }elseif($table=='tbl_menu'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'menuid' )
                 ->validator( 'Validate::unique' )
                 ->getFormatter( function ( $val, $data, $opts ) {
                        return $data['parent'].$data['child'];
                    }),
                Field::inst( 'parent' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'child' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'icon' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'nav' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'url' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'tabel')
                ->validator( 'Validate::notEmpty' ),
                Field::inst( 'orders')
                ->validator( 'Validate::numeric' )
                ->validator( 'Validate::notEmpty' )
            )
            ->on( 'preEdit', function ( $editor, $id, &$values) {
                $editor
                        ->field('menuid')
                        ->setValue($values['parent'] . $values['child']);
                $this->ChangeMenu('edit',$id, $values );
            } )
            ->on( 'preRemove', function ($editor, $id, $values ) {
                $this->ChangeMenu('delete',$id, $values );
            } )
            
             ->on( 'preCreate', function ( $editor,&$values ) {
                $editor
                    ->field( 'menuid' )
                    ->setValue( $values['parent'].$values['child']);
                    
            } )
            ->on( 'postCreate', function (  $editor, $id, $values, $row ) {
                $this->ChangeMenu('create', '',$values );
            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } ) 
            ->process( $post )
            ->json();
        }elseif($table=='tbl_working_time'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'day' )
                 ->options( Options::inst()
                        ->table( 'tbl_day' )
                        ->value( 'day' )
                        ->label( 'day' )
                    ),
                Field::inst( 'shift' )
                ->validator( Validate::values( array('Day', 'Night'), ValidateOptions::inst()
                ->message( 'Please input Day or Night' ) ) ),
                Field::inst( 'start')
                  ->validator( 'Validate::notEmpty' )
                  ->validator( Validate::dateFormat(
                    'H:i:s',ValidateOptions::inst()->allowEmpty( false )
                 ) ),
                Field::inst( 'finish' )
                  ->validator( 'Validate::notEmpty' )
                  ->validator( Validate::dateFormat(
                    'H:i:s',ValidateOptions::inst()->allowEmpty( false )
                 ) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
           
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )        
            ->process( $post )
            ->json();
        }elseif($table=='tbl_rest_time'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'day' )
                 ->options( Options::inst()
                        ->table( 'tbl_day' )
                        ->value( 'day' )
                        ->label( 'day' )
                    ),
                Field::inst( 'shift' )
                ->validator( Validate::values( array('Day', 'Night'), ValidateOptions::inst()
                ->message( 'Please input Day or Night' ) ) ),
                Field::inst( 'start')
                  ->validator( 'Validate::notEmpty' )
                  ->validator( Validate::dateFormat(
                    'H:i:s',ValidateOptions::inst()->allowEmpty( false )
                 ) ),
                Field::inst( 'finish' )
                  ->validator( 'Validate::notEmpty' )
                  ->validator( Validate::dateFormat(
                    'H:i:s',ValidateOptions::inst()->allowEmpty( false )
                 ) ),
                Field::inst( 'durasi'),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
                )
            
            ->on( 'preCreate', function ( $editor,$values ) {
                $time1 = strtotime($values['start']);
                $time2 = strtotime($values['finish']);
                $dur = $time2 - $time1;
                if($values['start']>$values['finish']){
                    $dur = 86400-($time1 - $time2);
                }
                $dur = ($dur/60);
                $editor
                    ->field( 'durasi' )
                    ->setValue($dur);
                
            } )
            ->on( 'preEdit', function ( $editor, $id, $values ) {
              
                $time1 = strtotime($values['start']);
                $time2 = strtotime($values['finish']);
                $dur = $time2 - $time1;
                if($values['start']>$values['finish']){
                    $dur = 86400-($time1 - $time2);
                }
                $dur = ($dur/60);
                $editor
                    ->field( 'durasi' )
                    ->setValue($dur);
            } )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )        
            ->process( $post )
            ->json();
         }elseif($table=='tbl_pesan_andon'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'andon' )
                ->validator( 'Validate::notEmpty' ),
                Field::inst( 'pesan' )
                ->validator( 'Validate::notEmpty' )
            )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )      
            ->process( $post )
            ->json();
        }elseif($table=='tbl_conf_ajs'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'shop' )
                ->validator( 'Validate::notEmpty' ),
                Field::inst( 'trip' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'sliporder' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'lifting_no' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'max_trip_shift' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'max_lifting_trip' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'auto' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'source_auto' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'history_auto' )
                ->validator( 'Validate::notEmpty' ),
                 Field::inst( 'time_delay' )
                ->validator( 'Validate::notEmpty' ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

            )
             ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )      
            ->process( $post )
            ->json();
        }elseif($table=='tbl_conf_backup'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'tabel_name' )
                 ->options( Options::inst()
                        ->table( 'tbl_menu')
                        ->value( 'tabel')
                        ->label( 'tabel')
                        ->where( function ($q){
                                $q->where( 'parent', 'backup' );
                                $q->where( 'child', '-','!=' );
                        })
                    )
                ->validator('Validate::dbValues'),
                Field::inst('date_field')->validator( 'Validate::notEmpty' ),
                Field::inst('start_value')->validator( 'Validate::notEmpty' ),
                Field::inst('end_value')->validator( 'Validate::notEmpty' ),
                Field::inst('other_field')->setFormatter( Format::ifEmpty(null)),
                Field::inst('other_value')->setFormatter( Format::ifEmpty(null)),
                Field::inst('execute_date')->setFormatter( Format::ifEmpty(null)),
                Field::inst('execute_by')->setFormatter( Format::ifEmpty(null)),
                Field::inst('max_row_backup')->setFormatter( Format::ifEmpty(0)),
                Field::inst('actual_row_backup')->setFormatter( Format::ifEmpty(0)),
                Field::inst('limit_execute')->setFormatter( Format::ifEmpty(0)),
                Field::inst('status')->validator('Validate::notEmpty'),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )     
            ->process( $post )
            ->json();
        }elseif($table=='tbl_logdate'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
                Field::inst( 'id' ),
                Field::inst( 'action')
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'data' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst( 'device' )
                  ->validator( 'Validate::notEmpty' ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )    
            ->process( $post )
            ->json();
        }elseif($table=='tbl_user'){
            Editor::inst( $this->editorDb, $table)
            ->fields(
              Field::inst( 'id' ),
                Field::inst( 'username' )
                 ->validator( 'Validate::unique' )
                 ->validator(Validate::maxLen(30))
                 ->validator( 'Validate::notEmpty' ),
                Field::inst( 'password' )              
                   ->getFormatter( function ( $val, $data, $opts ) { return null;})
                ,
                Field::inst( 'nama' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'nik' )->validator( 'Validate::notEmpty' )->validator( Validate::numeric()),
                Field::inst( 'shift' )
                ->options( Options::inst()
                        ->table( 'tbl_shift')
                        ->value( 'shift')
                        ->label( 'shift')
                    ),
                Field::inst( 'image' )
                 ->upload( Upload::inst( './assets/img/__NAME__' )
                    ->db( 'files', 'id', array(
                        'filename'    => Upload::DB_FILE_NAME,
                        'remark'    => 'USER',
                        'filesize'    => Upload::DB_FILE_SIZE,
                        'web_path'    => Upload::DB_WEB_PATH,
                        'system_path' => Upload::DB_SYSTEM_PATH
                    ) )
                    ->validator( Validate::fileSize( 500000, 'Files must be smaller that 500K' ) )
                    ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg' ), "Please upload an image" ) )
                     )
                    ->setFormatter( Format::ifEmpty(null) ),
                Field::inst( 'user_level' )
                 ->options( Options::inst()
                        ->table( 'tbl_level')
                        ->value( 'user_level' )
                        ->label( 'user_level' )
                        ->where( function ($q) use ($user_level,$user_area) {
                            if($user_level!='Administrator'){
                                $q->where( 'user_area', $user_area );
                            }
                        })
                    )->validator( 'Validate::notEmpty' ),
                Field::inst( 'user_area' ),
                Field::inst( 'user_group' ),
                Field::inst( 'registrasi' )->set( Field::SET_CREATE ),
                Field::inst( 'idcard' )->validator( 'Validate::notEmpty' )->set( Field::SET_CREATE ),
                Field::inst( 'log_in' ),
                Field::inst( 'log_out' ),
                Field::inst( 'status' )->validator(Validate::values(array('Active', 'Non Active'))),
                Field::inst( 'update_by' )->set(true)->setValue($nama),
                Field::inst( 'update_time' )->set(true)->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7))
            )
            ->on( 'preCreate', function ( $editor,&$values ) {
                $p = $this->sha1->generate($values['password']);
                $p = strrev($p);
                $p = substr($p, 5);
                $editor
                    ->field('registrasi')
                    ->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7));
                $values['password'] = $p;
                $values['idcard'] = $this->sha1->generate($values['username']);
                $q = $this->db->get_where('tbl_level', array('user_level' => $values['user_level']), 1)->row();
                $values['user_area'] = $q->user_area;
                $values['user_group'] = $q->user_group;
            } )
            ->on( 'postCreate', function (  $editor, $id, $values, $row ) {
                //file values
                $qf = $this->db->get_where('files', array('id' => $values['image']), 1)->row();
                if(!empty($qf)){
                    $replace =  $values['nik'].'.jpg';
                    $df = array(
                        'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                        'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                        'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                    );
                    $this->db->update('files', $df, array('id' => $values['image']));
                    $oldDir = FCPATH . 'assets/img/';
                    $newDir = FCPATH . 'assets/img/';
                    rename($oldDir . $qf->filename, $newDir . $replace);
                }
                $m=$this->db->get('tbl_menu')->result(); 
                foreach ($m as $key) {
                    if($values['user_level']=='Administrator'){
                        $ot='yes';
                        $ex='yes';
                        $crud='yes';
                    }else{
                        $ot='no';
                        $ex='no';
                        $crud='no';
                    }
                    $da[]=array(
                        'menuid'=>$key->menuid,
                        'username'=>$values['username'],
                        'view_level'=>$ot,
                        'add_level'=>$crud,
                        'edit_level'=>$crud,
                        'delete_level'=>$crud,
                        'import_level'=>'no',
                        'print_level'=>'no',
                        'export_level'=>$ex,
                        'del_all'=>$crud,
                        'other_level'=>$crud
                        );
                        
                    }
                    $this->db->insert_batch('tbl_menu_user',$da);
            } )
            ->on( 'preEdit', function ( $editor, $id, $values ) {
                //file values
                $qf = $this->db->get_where('files', array('id' => $values['image']), 1)->row();
                if(!empty($qf)){
                    $replace = $values['nik'].'.jpg';
                    $df = array(
                        'filename'    => str_replace($qf->filename, $replace, $qf->filename),
                        'web_path'    => str_replace($qf->filename, $replace, $qf->web_path),
                        'system_path' => str_replace($qf->filename, $replace, $qf->system_path)
                    );
                    $this->db->update('files', $df, array('id' => $values['image']));
                    $oldDir = FCPATH . 'assets/img/';
                    $newDir = FCPATH . 'assets/img/';
                    rename($oldDir . $qf->filename, $newDir . $replace);
                }
                $qu=$this->db->get_where('tbl_user',array('id'=>$id),1)->row();
                if (!empty($values['password'])) {
                    $p = $this->sha1->generate($values['password']); $p=strrev($p); $p=substr($p,5);
                    $editor->field( 'password')->setValue( $p );

                }else{
                     $editor->field( 'password')->setValue($qu->password);
                }
                $q=$this->db->get_where('tbl_level',array('user_level'=>$values['user_level']),1)->row();
                $editor
                    ->field( 'user_area' )
                    ->setValue($q->user_area);
                $editor
                    ->field( 'user_group' )
                    ->setValue($q->user_group);
                if($values['username']!=$qu->username){
                    $da=array(
                      'username'=>$values['username']
                    );
                    $this->db->update('tbl_menu_user',$da,array('username'=>$qu->username));
                }
                
                
            } )
            ->on( 'preRemove', function ($editor, $id, $values ) {
                $this->db->delete('tbl_menu_user',array('username'=>$values['username']));
            } )
           
          ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )    
            ->validator( function ( $editor, $action, $data ) {
               /* if ( $action !== Editor::ACTION_READ && $user_group=='Admin') {
                    return 'Cannot modify data';
                }*/
            } )
            ->process( $post )
            ->json();
        }elseif($table=='tbl_master_document'){
             Editor::inst( $this->editorDb, $table)
                ->field(
                Field::inst('tbl_master_document.id'),
                Field::inst('tbl_master_document.doc_name')->validator( 'Validate::notEmpty' )->validator( 'Validate::unique' ),
                Field::inst('tbl_master_document.doc_no')->validator( 'Validate::notEmpty' ),
                Field::inst('tbl_master_document.revision')->validator( 'Validate::notEmpty' ),
                Field::inst('tbl_master_document.active_date')->validator( Validate::dateFormat(
                    'Y-m-d',ValidateOptions::inst()->allowEmpty( false )
                 ) )->validator( 'Validate::notEmpty' ),
                Field::inst('tbl_master_document.remark')->validator( 'Validate::notEmpty' ),
                Field::inst('tbl_master_document.adjust_date')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('tbl_master_document.seq_sj')->setFormatter( Format::ifEmpty(null) )->validator( 'Validate::numeric' ),
                Field::inst('tbl_master_document.file' )
                 ->upload( Upload::inst( './assets/img/__ID__.__EXTN__' )
                    ->db( 'files', 'id', array(
                        'filename'    => Upload::DB_FILE_NAME,
                        'ext'         => Upload::DB_EXTN,
                        'filesize'    => Upload::DB_FILE_SIZE,
                        'web_path'    => Upload::DB_WEB_PATH,
                        'system_path' => Upload::DB_SYSTEM_PATH
                    ) )
                ->validator( Validate::fileSize( 5000000, 'Files must be smaller that 5 MB' ) )
                ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'pdf' ), "Please upload an file png jpg pdf" ) )
                 )
                ->setFormatter(Format::ifEmpty(null))
                ,
                Field::inst( 'tbl_master_document.part_no' )
                    ->options( function($db) {
                        return $db->select('tbl_master_seat', array('part_no', 'item'))->fetchAll();
                    } )
                    ->validator( Validate::dbValues(null, 'part_no', 'tbl_master_seat') ),
                Field::inst('tbl_master_seat.item' ),
                Field::inst('tbl_master_document.update_by')->set(true)->setValue($nama),
                Field::inst('tbl_master_document.update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))
            )
            ->on( 'preGet', function ( $editor,$id ) use($user_level,$field,$value){
                        $editor->where( function ( $q ) use($user_level,$field,$value){
                            if($field){
                                    $val_t=explode(',,',$value);
                                    $fie_t=explode(',,',$field);
                                    $ex_x=count($val_t);
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

                        });
                        
                } )    
            ->leftJoin( 'tbl_master_seat', 'tbl_master_seat.part_no', '=', 'tbl_master_document.part_no' )    
            ->process( $post )
            ->json();
        }    
    }
     
    //An additional method just to see if we can still use the Codeigniter database class (not required)
   function ChangeGroup ($action,$id, $values) {
        $q=$this->db->get_where('tbl_group',array('id'=>$id),1)->row();
        $a=$q->user_group;
        if(!empty($values['user_group'])){
             $user_group=$values['user_group'];
         }else{
             $user_group=$a;
         }
        $data=array(
            'user_group'=>$user_group
        );
        if($action=='edit'){
             if($user_group!=''){
                $this->db->update('tbl_level',$data,array('user_group'=>$a));
                $this->db->update('tbl_user',$data,array('user_group'=>$a));
            }
        }else{
            $this->db->delete('tbl_level',array('user_group'=>$a));
            $this->db->delete('tbl_user',array('user_group'=>$a));
        }
        

    }
    function ChangeArea ($action,$id, $values) {
        $q=$this->db->get_where('tbl_area',array('id'=>$id),1)->row();
        $a=$q->user_area;
        if(!empty($values['user_area'])){
             $user_area=$values['user_area'];
         }else{
             $user_area=$a;
         }
        $data=array(
            'user_area'=>$user_area
        );
        if($action=='edit'){
                $this->db->update('tbl_level',$data,array('user_area'=>$a));
                $this->db->update('tbl_user',$data,array('user_area'=>$a));
        }else{
            $this->db->delete('tbl_level',array('user_area'=>$a));
            $this->db->delete('tbl_user',array('user_area'=>$a));
        }
        

    }
     function ChangeLevel ($action,$id, $values) {
        if($action=='edit'){
                $q=$this->db->get_where('tbl_level',array('id'=>$id),1)->row();
                $a=$q->user_level;
                if(!empty($values['user_level'])){
                     $user_level=$values['user_level'];
                 }else{
                     $user_level=$a;
                 }
               
                $data=array(
                    'user_level'=>$user_level
                );
                $this->db->update('tbl_user',$data,array('user_level'=>$a));
                $this->db->update('tbl_pos',$data,array('user_level'=>$a));            
        }

    }
    function ChangeMenu ($action,$id, $values) {    
        if($action=='create'){
             $menuid=$values['parent'].$values['child'];
             $m=$this->db->get('tbl_user')->result();
            foreach ($m as $key) {
            if($key->user_level=='Administrator'){
                $ot='yes';
                $ex='yes';
                $crud='yes';
            }else{
                $ot='no';
                $ex='no';
                $crud='no';
            }
             $data2[]=array(
                'menuid'=>$menuid,
                'username'=>$key->username,
                'view_level'=>$ot,
                'add_level'=>$crud,
                'edit_level'=>$crud,
                'delete_level'=>$crud,
                'import_level'=>'no',
                'print_level'=>'no',
                'export_level'=>$ex,
                'del_all'=>$crud,
                'other_level'=>$crud
                );
                
            }
            $this->db->insert_batch('tbl_menu_user',$data2);
            if($values['parent']=='backup' and $values['child']!='-'){
               $table=$values['tabel'];
               $now=gmdate('Y-m-d H:i:s',time()+60*60*7);
               $this->load->dbforge();
               $db2 = $this->load->database('backup', TRUE);
               $ct=$db2->table_exists($table);
               if($ct){
                  $this->dbforge->rename_table('dbbackup.'.$table, 'dbbackup.'.$table.'-'.$now);
               }
               //$this->dbforge->drop_table('dbbackup.'.$table,TRUE);
               $dest="dbbackup.".$table;
               $this->db->query("CREATE TABLE ".$dest." LIKE ".$table."");
            }
        }elseif($action=='edit'){
            $q=$this->db->get_where('tbl_menu',array('id'=>$id),1)->row();
            $a=$q->menuid;
            if(!empty($values['parent']) and !empty($values['child'])){
                 $menuid=$values['parent'].$values['child'];
             }else{
                 $menuid=$a;
             }
           
            $data=array(
                'menuid'=>$menuid
            );
            $this->db->update('tbl_menu_user',$data,array('menuid'=>$a));            
        }else{
            $q=$this->db->get_where('tbl_menu',array('id'=>$id),1)->row();
            $a=$q->menuid;
            $this->db->delete('tbl_menu_user',array('menuid'=>$a));
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