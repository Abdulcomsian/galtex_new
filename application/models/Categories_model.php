<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     /*
      Description:  Use to add category.
     */
    function add_category($Input = array()) {
        $insert_array = array_filter(array(
            "category_guid" => get_guid(),
            "category_name" => @ucfirst(strtolower($Input['category_name'])),
            "created_date" => date('Y-m-d H:i:s')
        ));
        $this->db->insert('tbl_categories', $insert_array);
        if($this->db->insert_id()){
            return TRUE;
        }
        return FALSE;
    }

    /*
      Description: 	Use to get categories
     */

     function get_categories1($Field = '', $Where = array(), $multiRecords = FALSE, $PageNo = 1, $PageSize = 150) {
        /* Additional fields to select */
         //products ids
        $this->db->select('product_id');
        $this->db->where('client_id',$Where['clientid']);  
         $query=$this->db->get('tbl_client_shop_products');
         $productids=$query->result_array();
         $array=[];
         foreach ($productids as $key => $value) {
              $array[]=$value['product_id'];
         }
        $Params = array();
        if (!empty($Field)) {
            $Params = array_map('trim', explode(',', $Field));
            $Field = '';
            $FieldArray = array(
                'created_date'  => 'DATE_FORMAT(C.created_date, "' . DATE_FORMAT . '") created_date',
                'category_id'   => 'C.category_id',
                'category_name' => 'C.category_name',
                
            );
            
            foreach ($Params as $Param) {
                $Field .= (!empty($FieldArray[$Param]) ? ',' . $FieldArray[$Param] : '');
            }
        }
       
        $this->db->select('C.category_guid');
        $this->db->select('count(P.product_category_id) as qty');
        if (!empty($Field)) $this->db->select($Field, FALSE);
        $this->db->from('tbl_categories C');
        $this->db->join('tbl_products P','P.product_category_id=C.category_id');
        $this->db->group_by("P.product_category_id"); 
        $this->db->where_in('P.product_id',$array);
        if (!empty($Where['keyword'])) {
            $Where['keyword'] = trim($Where['keyword']);
            $this->db->group_start();
            $this->db->like("C.category_name", $Where['keyword']);
            $this->db->group_end();
        }
        if (!empty($Where['category_id'])) {
            $this->db->where("C.category_id", $Where['category_id']);
        }
        if (!empty($Where['order_by']) && !empty($Where['sequence']) && in_array($Where['sequence'], array('ASC', 'DESC'))) {
            $this->db->order_by($Where['order_by'], $Where['sequence']);
        } else {
            $this->db->order_by('C.category_name', 'ASC');
        }

        /* Total records count only if want to get multiple records */
        if ($multiRecords) {
            $TempOBJ = clone $this->db;
            $TempQ = $TempOBJ->get();
            $Return['data']['total_records'] = $TempQ->num_rows();
            $this->db->limit($PageSize, paginationOffset($PageNo, $PageSize)); /* for pagination */
        } else {
            $this->db->limit(1);
        }

        $Query = $this->db->get();
        if ($Query->num_rows() > 0) {
            if ($multiRecords) {
                $Records = array();
                foreach ($Query->result_array() as $key => $Record) {
                    $Records[] = $Record;
                }
                $Return['data']['records'] = $Records;
                return $Return;
            } else {
                $Record = $Query->row_array();
                return $Record;
            }
        }
        return FALSE;
    }

    function get_categories($Field = '', $Where = array(), $multiRecords = FALSE, $PageNo = 1, $PageSize = 150) {
        /* Additional fields to select */
        $Params = array();
        if (!empty($Field)) {
            $Params = array_map('trim', explode(',', $Field));
            $Field = '';
            $FieldArray = array(
                'created_date'  => 'DATE_FORMAT(C.created_date, "' . DATE_FORMAT . '") created_date',
                'category_id'   => 'C.category_id',
                'category_name' => 'C.category_name',
                
            );
            
            foreach ($Params as $Param) {
                $Field .= (!empty($FieldArray[$Param]) ? ',' . $FieldArray[$Param] : '');
            }
        }
        $this->db->select('C.category_guid');
        //$this->db->select('count(P.product_category_id) as qty');
        if (!empty($Field)) $this->db->select($Field, FALSE);
        $this->db->from('tbl_categories C');
        // $this->db->join('tbl_products P','P.product_category_id=C.category_id');
        // $this->db->group_by("P.product_category_id"); 
        // $this->db->where('min_price',1000);
        if (!empty($Where['keyword'])) {
            $Where['keyword'] = trim($Where['keyword']);
            $this->db->group_start();
            $this->db->like("C.category_name", $Where['keyword']);
            $this->db->group_end();
        }
        if (!empty($Where['category_id'])) {
            $this->db->where("C.category_id", $Where['category_id']);
        }
        if (!empty($Where['order_by']) && !empty($Where['sequence']) && in_array($Where['sequence'], array('ASC', 'DESC'))) {
            $this->db->order_by($Where['order_by'], $Where['sequence']);
        } else {
            $this->db->order_by('C.category_name', 'ASC');
        }

        /* Total records count only if want to get multiple records */
        if ($multiRecords) {
            $TempOBJ = clone $this->db;
            $TempQ = $TempOBJ->get();
            $Return['data']['total_records'] = $TempQ->num_rows();
            $this->db->limit($PageSize, paginationOffset($PageNo, $PageSize)); /* for pagination */
        } else {
            $this->db->limit(1);
        }

        $Query = $this->db->get();
        if ($Query->num_rows() > 0) {
            if ($multiRecords) {
                $Records = array();
                foreach ($Query->result_array() as $key => $Record) {
                    $Records[] = $Record;
                }
                $Return['data']['records'] = $Records;
                return $Return;
            } else {
                $Record = $Query->row_array();
                return $Record;
            }
        }
        return FALSE;
    }

    /*
      Description:  Use to update category
     */
    function update_category($category_id, $Input = array()) { 
        $this->db->where('category_id', $category_id);
        $this->db->limit(1);
        $this->db->update('tbl_categories', array('category_name' => @ucfirst(strtolower($Input['category_name']))));
        return TRUE;
    }

    /*
      Description:  Use to delete category.
    */
    function delete_category($category_guid) {
        $usersData = $this->db->select('*')
        ->from('tbl_products')
        ->join('tbl_categories', 'tbl_categories.category_id = tbl_products.product_category_id')
        ->where('tbl_categories.category_guid', $category_guid)
        ->get();
        $affectedRows = $this->db->affected_rows();
        if ($affectedRows >= 1) {
            return false;
        } else {
            // No products associated, proceed with category deletion
            $this->db->where('category_guid', $category_guid);
            $this->db->limit(1);
            $this->db->delete('tbl_categories');
            // Check if any rows were affected by the delete operation
            if ($this->db->affected_rows() >= 1) {
                // Category deleted successfully
                return true;
            } else {
                // Category with the given guid not found
                // Handle this case accordingly, e.g., set flashdata
                return false;
            }
        }

        // $this->db->where('category_guid',$category_guid);
        // $this->db->limit(1);
        // $this->db->delete('tbl_categories');
        // if($this->db->affected_rows() > 0){
        //     return TRUE;
        // }
        // return FALSE;
    }


}
