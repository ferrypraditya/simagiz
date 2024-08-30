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

class AndonModel extends CI_Model
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

    public function getData($post, $table)
    {
       if ($table == 'view_stockorder') {
            Editor::inst($this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('part_no'),
                    Field::inst('part_name'),
                    Field::inst('job_no'),
                    Field::inst('customer_code'),
                    Field::inst('status_part'),
                    Field::inst('qty_box'),
                    Field::inst('qty_box_customer'),
                    Field::inst('subcont_code'),
                    Field::inst('store'),
                    Field::inst('qrrack'),
                    Field::inst('routing'),
                    Field::inst('odr'),
                    Field::inst('irm'),
                    Field::inst('rm'),
                    Field::inst('shr'),
                    Field::inst('p_bl'),
                    Field::inst('bl'),
                    Field::inst('stp'),
                    Field::inst('p_sw'),
                    Field::inst('sw'),
                    Field::inst('p_rhsw'),
                    Field::inst('rhsw'),
                    Field::inst('p_wd'),
                    Field::inst('wd'),
                    Field::inst('p_rwd'),
                    Field::inst('rwd'),
                    Field::inst('ed'),
                    Field::inst('plat'),
                    Field::inst('sc'),
                    Field::inst('inc'),
                    Field::inst('pipe'),
                    Field::inst('ifp'),
                    Field::inst('min_pcs'),
                    Field::inst('max_pcs'),
                    Field::inst('min_box'),
                    Field::inst('max_box'),
                    Field::inst('stock_all'),
                    Field::inst('stock_box_ifp'),
                    Field::inst('status_stock'),
                    Field::inst('order_customer'),
                    Field::inst('status_setting'),
                    Field::inst('setting_date'),
                    Field::inst('delv_date'),
                    Field::inst('remark')
                )

                ->on('preGet', function ($editor, $id) {
                    $editor->where(function ($q){
                        $q->where('store', '%IFP%', 'like');
                        $q->where('action', 'Show', '=');
                        $q->where('ifp', null, '!=');
                    });
                })
                ->process($post)
                ->json();
         } elseif ($table == 'view_stockog') {
            Editor::inst($this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('part_no'),
                    Field::inst('job_no'),
                    Field::inst('routing'),
                    Field::inst('subcont_code'),
                    Field::inst('customer_code'),
                    Field::inst('qty_box'),
                    Field::inst('min_pcs'),
                    Field::inst('max_pcs'),
                    Field::inst('min_box'),
                    Field::inst('max_box'),
                    Field::inst('sc'),
                    Field::inst('inc'),
                    Field::inst('ifp'),
                    Field::inst('stock'),
                    Field::inst('status_stock'),
                    Field::inst('plan_setting'),
                    Field::inst('stock_og'),
                    Field::inst('status_setting'),
                    Field::inst('qty_setting'),
                    Field::inst('order_customer'),
                    Field::inst('status_order'),
                    Field::inst('delv_date'),
                    Field::inst('remark')

                )

                ->on('preGet', function ($editor, $id) {
                    $editor->where(function ($q){
                     
                    });
                })
                ->process($post)
                ->json();
            
             } elseif ($table == 'tbl_h_outrm') {
                Editor::inst($this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('part_no'),
                    Field::inst('job_no'),
                    Field::inst('part_name'),
                    Field::inst('spec'),
                    Field::inst('qty_out'),
                    Field::inst('status'),
                    Field::inst('eplan'),
                    Field::inst('qty_mat'),
                    Field::inst('scan_time')

                )

                ->on('preGet', function ($editor, $id) {
                    
                    $editor->where(function ($q){
                     $q->where('status', 'OPEN', '=');
                    });
                })
                ->process($post)
                ->json();
            }elseif($table == 'tbl_h_rmat') {
                Editor::inst($this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('qrcode'),
                    Field::inst('qty_rec'),
                    Field::inst('rec_time'),
                    Field::inst('rec_by')

                )

                ->on('preGet', function ($editor, $id) {
                    
                    $editor->where(function ($q){
                    $now='%'.gmdate('Y-m-d',time()+60*60*7).'%';
                     $q->where('rec_time', $now, 'like');
                    });
                })
                ->process($post)
                ->json();
            }elseif($table=='tbl_temp_eplan'){
                Editor::inst( $this->editorDb, $table)
                    ->fields(
                    Field::inst('id'),
                    Field::inst('eplan')->setFormatter(Format::ifEmpty(null)),
                    Field::inst('fam_kbn')->setFormatter(Format::ifEmpty(null)),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('job_no')->setFormatter(Format::ifEmpty(null)),
                    Field::inst('part_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('customer')->validator( 'Validate::notEmpty' ),
                    Field::inst('status_part')->validator( 'Validate::notEmpty' ),
                    Field::inst('subcont')->setFormatter(Format::ifEmpty(null)),
                    Field::inst('qty_kbn')->validator( 'Validate::notEmpty' ),
                    Field::inst('ifp')->validator( 'Validate::notEmpty' ),
                    Field::inst('min')->validator( 'Validate::notEmpty' ),
                    Field::inst('max')->validator( 'Validate::notEmpty' ),
                    Field::inst('status_stock')->validator( 'Validate::notEmpty' ),
                    Field::inst('cust_order')->validator( 'Validate::notEmpty' ),
                    Field::inst('production')->validator( 'Validate::notEmpty' ),
                    Field::inst('category')->validator( 'Validate::notEmpty' ),
                    Field::inst('last_delv')->validator( 'Validate::notEmpty' ),
                    Field::inst('progress')->validator( 'Validate::notEmpty' ),
                    Field::inst('on_order')->validator( 'Validate::notEmpty' ),
                    Field::inst('line')->validator( 'Validate::notEmpty' ),
                    Field::inst('machine')->validator( 'Validate::notEmpty' ),
                    Field::inst('status')->validator( 'Validate::notEmpty' ),
                    Field::inst('ifp_pcs')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('min_pcs')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('max_pcs')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('status_ifp')->setFormatter(Format::ifEmpty(null))
                )
                ->on( 'preGet', function ( $editor,$id ){
                        $editor->where( function ( $q ){
                            $q->where('display','Yes', '=');
                        });
                        
                } )    
           ->process( $post )
           ->json();
        }elseif($table=='tbl_andon_mat'){
                Editor::inst( $this->editorDb, $table)
                    ->fields(
                    Field::inst('id'),
                    Field::inst('part_no')->validator( 'Validate::notEmpty' ),
                    Field::inst('job_no')->setFormatter(Format::ifEmpty(null)),
                    Field::inst('part_name')->validator( 'Validate::notEmpty' ),
                    Field::inst('customer')->validator( 'Validate::notEmpty' ),
                    Field::inst('category')->validator( 'Validate::notEmpty' ),
                    Field::inst('odr')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('irm')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('shr')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('rm')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('stock_all')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('min_day')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('max_day')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('min')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('max')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('order_cust')->setFormatter(Format::ifEmpty(0)),
                    Field::inst('status_stock')->validator( 'Validate::notEmpty' )
                )
                ->on( 'preGet', function ( $editor,$id ){
                        $editor->where( function ( $q ){
                             $q->where('display','Yes', '=');
                        });
                        
                } )    
           ->process( $post )
           ->json();
        } elseif ($table == 'view_tl') {
            Editor::inst($this->editorDb, $table)
                ->fields(
                    Field::inst('id'),
                    Field::inst('part_no'),
                    Field::inst('part_name'),
                    Field::inst('supplier_code'),
                    Field::inst('category'),
                    Field::inst('store'),
                    Field::inst('rack'),
                    Field::inst('satuan'),
                    Field::inst('qty_packing'),
                    Field::inst('min_stock'),
                    Field::inst('max_stock'),
                    Field::inst('odr'),
                    Field::inst('stock'),
                    Field::inst('status_stock')
                )

                ->on('preGet', function ($editor, $id) {
                    $editor->where(function ($q){
                     
                    });
                })
                ->process($post)
                ->json();
        }
    }
}
