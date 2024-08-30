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

class PlanModel extends CI_Model
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

        if($table=='data_order'){
            
            Editor::inst( $this->editorDb, $table)
                ->fields(
					Field::inst('id'),
					Field::inst('kode_sekolah')->validator( 'Validate::notEmpty'),
					Field::inst('nama_sekolah')->validator( 'Validate::notEmpty'),
					Field::inst('kode_paket')->validator('Validate::notEmpty'),
					Field::inst('nama_paket')->validator( 'Validate::notEmpty'),
					Field::inst('kode_dapur')->validator( 'Validate::notEmpty'),
					Field::inst('qty_order')->validator( 'Validate::notEmpty'),
					Field::inst('tgl_order')
						->validator( 'Validate::notEmpty')
						->validator( Validate::dateFormat( 'Y-m-d' ,ValidateOptions::inst()
						->message( 'Please Format YYYY-MM-DD') ))
						->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
						->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
					Field::inst('pic_order')->validator( 'Validate::notEmpty'),
					Field::inst('qty_packing')->setFormatter( Format::ifEmpty(null) ),
					Field::inst('tgl_packing')
						->validator( 'Validate::notEmpty')
						->validator( Validate::dateFormat( 'Y-m-d' ,ValidateOptions::inst()
						->message( 'Please Format YYYY-MM-DD') ))
						->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
						->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
					Field::inst('qty_delivery')->setFormatter( Format::ifEmpty(null) ),
					Field::inst('tgl_delivery')
						->validator( 'Validate::notEmpty')
						->validator( Validate::dateFormat( 'Y-m-d' ,ValidateOptions::inst()
						->message( 'Please Format YYYY-MM-DD') ))
						->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
						->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
					Field::inst('qty_receipt')->setFormatter( Format::ifEmpty(null) ),
					Field::inst('tgl_receipt')
					->validator( 'Validate::notEmpty')
					->validator( Validate::dateFormat( 'Y-m-d' ,ValidateOptions::inst()
					->message( 'Please Format YYYY-MM-DD') ))
					->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
					->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
            )
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->changeSoj($id, $values );
                $this->logdate('edit'.$table,$values['sliporder'].'|'.$values['lifting_no'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->removeSoj($id, $values);
                $this->logdate('remove'.$table, $values['sliporder'].'|'.$values['lifting_no'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,$values){
                $arr=$_POST['data'];
                $xx=array();
                $vv=array();
                foreach($arr as $key=>$val){
                 $xx[]=$val['lifting_no'];
                 $vv[]=$val['vin'];

                }
                $editor
                    ->field( 'file_name' )
                    ->setValue('Manual');
                $editor
                    ->field( 'input_time' )
                    ->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7));
                $editor
                    ->field( 'calc_prod_time' )
                    ->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7));   
                $editor
                    ->field( 'lifting_no' )
                    ->validator( function ( $val, $data, $field, $host ) use($xx,$arr){
                        if($this->isArrUni($xx)==false){
                            $m="This field must have a unique value. ".$this->getArrUni($xx);
                        }else{
                            $m=true;
                            $qt=$this->db->query("SELECT * FROM data_ajs WHERE shop='".$data['shop']."' order by id desc limit 1 ")->row();
                            if(empty($qt)){
                                $lfh2=1;
                            }elseif(intval($qt->lifting_no)==9999){
                                $lfh2=1;
                            }else{
                                $lfh2=intval($qt->lifting_no)+1;
                            }
                            $x='';
                            foreach($arr as $key=>$val){
                                if($lfh2!=intval($val['lifting_no'])){
                                    $x=$x.' '.$val['lifting_no'];
                                    $m='Lifting shop A2 jumping! '.$x;
                                }
                                $lfh2=intval($val['lifting_no']);
                                if($lfh2==9999){
                                    $lfh2=1;
                                }else{
                                    $lfh2=$lfh2+1;
                                }
                                
                            }
                            
                        }
                        return $m;
                    });
                $editor
                    ->field( 'vin' )
                    ->validator( function ( $val, $data, $field, $host ) use($vv){
                        if($this->isArrUni($vv)==false){
                            $m="This field must have a unique value. ".$this->getArrUni($vv);
                        }else{
                            $m=true;
                        }
                        return $m;
                    });
                $editor
                    ->field( 'prod_date' )
                    ->validator( function ( $val, $data, $field, $host ){
                        $hour= intval(gmdate('H',time()+60*60*7));
                        $menit= intval(gmdate('i',time()+60*60*7));
                        $cek=($hour*60)+$menit;
                        if($cek<440){
                            $min_date = date('Y-m-d',strtotime('-1 days',strtotime(gmdate('Y-m-d',time()+60*60*7))));
                        }else{
                            $min_date = gmdate('Y-m-d',time()+60*60*7);
                        }
                        
                        if($val<$min_date){
                            $m="This minimum date <i class='text-success'>[".$min_date."]</i> false date ". $data['prod_date'];
                        }else{
                            $m=true;
                            
                        }
                        return $m;
                });              
                    
            } )
            ->on('postCreate', function ($editor, $id, &$values, &$row) use($nama,$table) {
                $hour= intval(gmdate('H',time()+60*60*7));
                $menit= intval(gmdate('i',time()+60*60*7));
                $cek=($hour*60)+$menit;
                if($cek>=440 AND $cek<1260){ 
                    $prod_shift="Day";
                }else{
                    $prod_shift="Night";
                }
                $this->db->query("INSERT INTO prod_regular (prod_date,prod_shift,model,lifting_no,suffix,grade,variant1,variant2,variant3,variant4,description,seat_code,side,code,line_no,suffix_master,part_no,job_no,airbag,qrcode,create_date) SELECT '".$values['prod_date']."','".$prod_shift."',a.model,'".$values['lifting_no']."','".$values['suffix']."',a.grade,a.variant1,a.variant2,a.variant3,a.variant4,a.description,a.seat_code,a.side,a.code,a.line_no,a.suffix_master,a.part_no,a.job_no,a.airbag,CONCAT(a.part_no,'|','".$values['suffix']."|".$values['lifting_no']."|".$values['sliporder']."|',a.seat_code,'|',a.side,'|',a.code,'|',a.model,'|',a.line_no,'|".$values['prod_date']."'),now() FROM tbl_m_seat a left join prod_regular b on(CONCAT(a.part_no,'|','".$values['suffix']."|".$values['lifting_no']."|".$values['sliporder']."|',a.seat_code,'|',a.side,'|',a.code,'|',a.model,'|',a.line_no,'|".$values['prod_date']."')=b.qrcode) WHERE a.status='Active' and a.model='".$values['model']."' and a.suffix_master like '%".$values['suffix']."%' and b.id is null group by a.seat_code,a.side order by a.seat_code,a.side");
                //$this->db->query("INSERT INTO data_shipping (prod_date,prod_shift,shop,sliporder,lifting_no,suffix,vin,model,grade,seat_code,side,code,suffix_master,part_no,job_no) SELECT '".$values['prod_date']."','".$prod_shift."',a.shop,'".$values['sliporder']."','".$values['lifting_no']."','".$values['suffix']."','".$values['vin']."',a.model,a.grade,a.seat_code,a.side,a.code,a.suffix_master,a.part_no,a.job_no FROM tbl_m_seat a left join data_shipping b on(a.seat_code=b.seat_code and a.side=b.side and b.sliporder='".$values['sliporder']."' and b.lifting_no='".$values['lifting_no']."') WHERE a.status='Active' and a.model='".$values['model']."' and a.suffix_master like '%".$values['suffix']."%' and b.id is null group by a.seat_code,a.side order by a.seat_code,a.side");
                $this->logdate('create'.$table, $values['sliporder'].'|'.$values['lifting_no'],$nama);
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
        }elseif($table=='prod_special'){
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
                $this->logdate('edit'.$table,$values['qrcode'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table, $values['qrcode'],$nama);
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
            ->on( 'preEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table, $values['sliporder'].$values['lifting_no'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->logdate('remove'.$table, $values['sliporder'].$values['lifting_no'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,$values) use($nama,$table) {
                $this->logdate('create'.$table, $values['sliporder'].$values['lifting_no'],$nama);
                    
            } )       
            ->process( $post )
            ->json();
        }elseif($table=='data_special'){
            Editor::inst( $this->editorDb, $table)
                ->fields(
                Field::inst('id'),
                Field::inst('prod_id')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('lifting_no'),
                Field::inst('prod_date')
                ->validator( 'Validate::notEmpty')
                    ->validator( Validate::dateFormat( 'Y-m-d' ,ValidateOptions::inst()
                    ->message( 'Please Format YYYY-MM-DD') ))
                    ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
                    ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
                Field::inst('prod_shift')->validator( 'Validate::notEmpty'),
                Field::inst('model')->validator( 'Validate::notEmpty'),
                Field::inst('suffix')
                ->getFormatter('Format::toUpperCase')
                ->setFormatter('Format::toUpperCase')
                ->validator( 'Validate::notEmpty')
                ->validator( function ( &$val, &$data, $field, $host ) {
                            $val=strtoupper(trim($val));
                            $query1="";
                            $query2="";
                            if($data['seat_code']!='ALL'){
                                $query1=" and seat_code='".$data['seat_code']."'";
                            }
                            if($data['side']!='ALL'){
                                $query2=" and side='".$data['side']."'";
                            }
                            $query=$query1." ".$query2;
                            $csfx=$this->db->query("SELECT * from tbl_m_seat WHERE model='".$data['model']."' and suffix_master like '%".$val."%' ".$query." limit 1")->row();
                            $asfx=$this->db->query("SELECT * from tbl_m_seat WHERE model='".$data['model']."' and suffix_master like '%".$val."%' and status='Active'  ".$query."  limit 1")->row();
                            if(strlen( $val ) > 2){
                                return 'Max 2 Character';
                            }elseif(empty($csfx)){
                                return 'Modal & Suffix belum terdaftar di master!';
                            }elseif(empty($asfx)){
                                return 'Modal & Suffix Non Active!';
                            }else{                              
                                return true;
                            } 
                    } ),
                Field::inst('seat_code')->validator( 'Validate::notEmpty'),
                Field::inst('side')->validator( 'Validate::notEmpty'),
                Field::inst('remark')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('input_by')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('input_time')->setFormatter( Format::ifEmpty(null) ),
                Field::inst('update_by')->set(true)->setValue($nama),
                Field::inst('update_time')->set(true)->setValue( gmdate('Y-m-d H:i:s',time()+60*60*7))

            )
            
            ->on( 'postEdit', function ( $editor, $id, $values) use($nama,$table) {
                $this->logdate('edit'.$table, $values['prod_id'].'|'.$values['lifting_no'], $nama);
                } )
            ->on( 'preRemove', function ($editor, $id, $values ) use($nama,$table) {
                $this->removeSP ($id, $values);
                $this->logdate('remove'.$table,$values['prod_id'].'|'.$values['lifting_no'],$nama);
            } )
            ->on( 'preCreate', function ( $editor,&$values) use($nama,$table) {
                $editor
                    ->field( 'input_time' )
                    ->setValue(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7));
                $editor
                    ->field( 'input_by' )
                    ->setValue($nama);
                $editor
                    ->field( 'prod_date' )
                    ->validator( function ( $val, $data, $field, $host ){
                        $hour= intval(gmdate('H',time()+60*60*7));
                        $menit= intval(gmdate('i',time()+60*60*7));
                        $cek=($hour*60)+$menit;
                        if($cek<440){
                            $min_date = date('Y-m-d',strtotime('-1 days',strtotime(gmdate('Y-m-d',time()+60*60*7))));
                        }else{
                            $min_date = gmdate('Y-m-d',time()+60*60*7);
                        }
                        
                        if($val<$min_date){
                            $m="This minimum date <i class='text-success'>[".$min_date."]</i> false date ". $data['prod_date'];
                        }else{
                            $m=true;
                            
                        }
                        return $m;
                });                    
            } ) 
           ->on( 'preGet', function ( $editor,$id ) use ($user_level,$field,$value,$nama,$table){
                    $qs = $this->db->query("SELECT * FROM data_special WHERE prod_id is null order by id asc")->result();
                    if(!empty($qs)){
                        foreach($qs as $key){
                            $prod=str_replace('-','',substr($key->prod_date,0,7));
                            $q = $this->db->query("SELECT SUBSTRING_INDEX(prod_id,'-',-1) as no,SUBSTRING(lifting_no,2,3) as seq FROM data_special WHERE SUBSTRING_INDEX(prod_id,'-',1)='".$prod."' order by id desc limit 1")->row();
                            $no=1;
                            $seq=1;
                            $sfx=$key->suffix;
                            if(!empty($q)){
                                $no=$q->no+1;
                                $seq=intval($q->seq)+1;
                                if($seq==1000){
                                  $seq=1;
                                }
                            }   
                            $prod_id=$prod.'-'.$no;                        
                              if($seq<10){
                                $lifting_no='S00'.$seq;
                              }elseif ($seq>=10 and $seq<100) {
                                $lifting_no='S0'.$seq;
                              }else{
                                $lifting_no='S'.$seq;
                              }

                            $query1="";
                            $query2="";
                            if($key->seat_code!='ALL'){
                                $query1=" and a.seat_code='".$key->seat_code."'";
                            }
                            if($key->side!='ALL'){
                                $query2=" and a.side='".$key->side."'";
                            }
                            $query=$query1." ".$query2;

                            $x=$this->db->query("INSERT INTO prod_special (prod_date,prod_shift,model,lifting_no,suffix,grade,variant1,variant2,variant3,variant4,description,seat_code,side,code,line_no,suffix_master,part_no,job_no,airbag,qrcode,create_date) SELECT '".$key->prod_date."','".$key->prod_shift."',a.model,'".$lifting_no."','".$sfx."',a.grade,a.variant1,a.variant2,a.variant3,a.variant4,a.description,a.seat_code,a.side,a.code,a.line_no,a.suffix_master,a.part_no,a.job_no,a.airbag,CONCAT(a.part_no,'|','".$sfx."|".$lifting_no."|".$prod_id."|',a.seat_code,'|',a.side,'|',a.code,'|',a.model,'|',a.line_no,'|".$key->prod_date."'),now() FROM tbl_m_seat a left join prod_special b on(CONCAT(a.part_no,'|','".$sfx."|".$lifting_no."|".$prod_id."|',a.seat_code,'|',a.side,'|',a.code,'|',a.model,'|',a.line_no,'|".$key->prod_date."')=b.qrcode) WHERE a.status='Active' and a.model='".$key->model."' and a.suffix_master like '%".$sfx."%' ".$query." and b.id is null group by a.seat_code,a.side order by a.seat_code,a.side");
                            if($x){
                                $this->db->query("UPDATE  data_special set prod_id='".$prod_id."',lifting_no='".$lifting_no."' WHERE id='".$key->id."'");
                                $this->logdate('create'.$table, $prod_id.'|'.$lifting_no,$nama);
                            }
                            

                        }
                        
                    }

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
     function removeSoj ($id, $values) {
        $q=$this->db->get_where('data_ajs',array('id'=>$id),1)->row();
        $qr=$q->lifting_no.'|'.$q->sliporder;
        if(!empty($q)){
            $this->db->query("DELETE FROM prod_regular WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(qrcode,'|',4),'|',-2)='".$qr."' and assy_start is null");
            $this->db->query("DELETE FROM data_shipping WHERE sliporder='".$q->sliporder."' and lifting_no='".$q->lifting_no."' and shipping_time is null");
        }

    }
    function changeSoj ($id, $values) {
        $q=$this->db->get_where('data_ajs',array('id'=>$id),1)->row();
        $shop=$q->shop;
        $suffix=$q->suffix;
        $so=$q->sliporder;
        $n_suffix=strtoupper($values['suffix']);
        if(!empty($q) and $n_suffix!=$suffix){
                

        }

    }
    
    function removeSP ($id, $values) {
        $q=$this->db->get_where('data_special',array('id'=>$id),1)->row();
        $qr=$q->lifting_no.'|'.$q->prod_id;
        if(!empty($q)){
            $this->db->query("DELETE FROM prod_special WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(qrcode,'|',4),'|',-2)='".$qr."' and assy_start is null");
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
  function isArrUni($array) {
        if (count($array) === count(array_unique($array))) {
            return true;
        } else {
            return false; 
            //"The array " . json_encode($array) ." does not contain unique values.\n";
        }
    }
function getArrUni($array){
    $counts = array_count_values($array);
    $x='';
        foreach ($counts as $name => $count) {
            if($count > 1){
                $x=$x.' '.$name; 
            }
        }
        return $x;
    }
    function array_flatten($array) { 
      if (!is_array($array)) { 
        return FALSE; 
      } 
      $result = array(); 
      foreach ($array as $key => $value) { 
        if (is_array($value)) { 
          $result = array_merge($result, array_flatten($value)); 
        } 
        else { 
          $result[$key] = $value; 
        } 
      } 
      return $result; 
    } 
}
