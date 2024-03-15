<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This Class used as admin employees management
 * @package   CodeIgniter
 * @category  Controller
 * @author    Sorav Garg (soravgarg123@gmail.com/+919074939905)
 */

class Employees extends Admin_Controller_Secure { 

	function __construct() {
        parent::__construct(); 
		$this->load->model('Orders_model');
		$this->load->model('Products_model');
	}
	
	/**
	 * Function Name: list
	 * Description:   To view employees list
	*/
	public function list()
	{
		$data['title'] = lang('employees');
		$data['module']= "employees";
		$data['css']   = array(
							'../../assets/admin/css/dataTables.bootstrap.min.css',
							'../../assets/admin/vendors/chosen_v1.4.2/chosen.min.css'
						);
		$data['js']    = array(
							'../../assets/admin/js/jquery.dataTables.min.js',
							'../../assets/admin/js/dataTables.bootstrap.min.js',
							'../../assets/admin/vendors/chosen_v1.4.2/chosen.jquery.min.js',
							'../../assets/admin/js/custom/employees.js'
						);	

		/* Get Employees */
		if($this->user_type_id == 2){
			$data['members'] = $this->Users_model->get_users('first_name,last_name,email,phone_number,client_configs,pricelist_name,pricelist_brand,user_status,client_first_name,client_last_name,created_date',array('order_by' => 'first_name', 'sequence' => 'ASC', 'user_type_id' => '3','client_id' => $this->session_user_id),TRUE);
	    }else{
	    	$data['members'] = $this->Users_model->get_users('first_name,last_name,email,phone_number,client_configs,pricelist_name,pricelist_brand,user_status,client_first_name,client_last_name,created_date',array('order_by' => 'first_name', 'sequence' => 'ASC', 'user_type_id' => 3),TRUE);	
	    }

		// echo "<pre>";
		// print_r($data['members']);
		// exit;
	    /* Get Clients */
		//new code starts here
		$this->load->database();
		$this->db->where('user_type_id' , 2 );
		$companiesList = $this->db->get('tbl_users');
		$companiesList = $companiesList->result();
		$data['companies'] = $companiesList;
		//new code ends here 
		$data['clients'] = $this->Users_model->get_users('first_name,last_name,email',array('order_by' => 'first_name', 'sequence' => 'ASC', 'user_type_id' => 2),TRUE);
		$data['client_id']= $this->session_user_id;
		$this->template->load('default', 'employees/list',$data);
	}

	/**
	 * Function Name: add_new
	 * Description:   To add new employee
	*/
	public function add_new()
	{
		$data['title']  = lang('add_new_employee');
		$data['module'] = "employees";

		$data['css']   = array(
							'../../assets/admin/vendors/chosen_v1.4.2/chosen.min.css'
						);
		$data['js']     = array(
							'../../assets/admin/vendors/chosen_v1.4.2/chosen.jquery.min.js',
							'../../assets/admin/js/custom/employees.js'
						);

		/* Get Clients */
		$data['clients'] = $this->Users_model->get_users('first_name,last_name,email',array('order_by' => 'first_name', 'sequence' => 'ASC', 'user_type_id' => 2, 'user_status' => 'Verified'),TRUE);
		$this->template->load('default', 'employees/add-new',$data);
	}

	/**
	 * Function Name: edit
	 * Description:   To edit employee
	*/
	public function edit($user_guid) 
	{
		$data['title']  = lang('edit_employee');
		$data['module'] = "employees";
		$data['css']    = array(
							'../../../assets/admin/vendors/chosen_v1.4.2/chosen.min.css'
						);
		$data['js']     = array(
							'../../../assets/admin/vendors/chosen_v1.4.2/chosen.jquery.min.js',
							'../../../assets/admin/js/custom/employees.js'
						);


		/*  To check user guid */	
		$query = $this->db->query('SELECT user_id FROM tbl_users WHERE user_guid = "'.$user_guid.'" LIMIT 1');
		if($query->num_rows() == 0){
			redirect('/admin/employees/list');
		}
		$user_id = $query->row()->user_id;

		/* To Get Employee Details */
        $data['details'] = $this->Users_model->get_users('first_name,last_name,email,phone_number,gender,user_status,client_guid',array('user_id' => $user_id));

        /* Get Clients */
		$data['clients'] = $this->Users_model->get_users('first_name,last_name,email',array('order_by' => 'first_name', 'sequence' => 'ASC', 'user_type_id' => 2, 'user_status' => 'Verified', 'user_guid' => $data['details']['client_guid']),TRUE);
		$this->template->load('default', 'employees/edit',$data);
	}

	/**
	 * Function Name: delete
	 * Description:   To delete employee
	*/
	public function delete($user_guid)
	{
		if(strpos($user_guid, '%')===0){
			$user_guid = urldecode($user_guid);
			if(!$this->Users_model->delete_user($user_guid)){
				$this->session->set_flashdata('error',lang('error_occured'));
				redirect('admin/employees/list');
			}else{
				$this->session->set_flashdata('success',lang('employee_deleted'));
				redirect('admin/employees/list');
			}
		}else{
			if(!$this->Users_model->delete_user($user_guid)){
				$this->session->set_flashdata('error',lang('error_occured'));
				redirect('admin/employees/list');
			}else{
				$this->session->set_flashdata('success',lang('employee_deleted'));
				redirect('admin/employees/list');
			}
		}
		
	}


	/**
	 * Function Name: upload
	 * Description:   To upload employees via csv
	*/
	public function upload()
	{
		if($this->user_type_id != 1){
        	$this->session->set_flashdata('error',lang('access_denied'));
        	redirect('admin/dashboard');
        }
        
		/*  To check product guid */	
		$query = $this->db->query('SELECT user_id FROM tbl_users WHERE user_guid = "'.$user_guid.'" LIMIT 1');
		if($query->num_rows() == 0){
			redirect('/admin/employees/list');
		}
		$user_id = $query->row()->user_id;

		/* To Get employee Details */
        $details = $this->Users_model->get_users('first_name, last_name, email, phone_number',array('user_id' => $user_id));

		/* delete images also */
		if(!$this->Users_model->delete_user($user_guid)){
			$this->session->set_flashdata('error',lang('error_occured'));
		}else{
			$this->session->set_flashdata('success',lang('product_deleted'));
		}
		redirect('admin/employees/list');
	}
	public function export_client_employees(){

		/* Get Products Orders */
		$client_id = $_REQUEST['client_id'];

		
		$filename = "client-employees--".date('d-F-Y-h-i-A').".csv";
        $fp = fopen('php://output', 'w');
        // header('Content-type: application/csv');
        header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        fputcsv($fp, array(lang('product_package_name'),lang('type'),lang('sold_quantity')));
        foreach ($order_arr as $row) {
            fputcsv($fp, $row);
        }
	}
	public function export_client_orders(){
		$data['orders'] = $this->Orders_model->get_orders('created_date,order_id,amount,employee_name,employee_email,employee_phone_number,address_mode,order_product_details,pickup_address,city,apartment,street_house,postal_code',array('payment_status' => array('Success'), 'order_status' => 'Created', 'client_id' => $_REQUEST['client_id']),TRUE);

		$order_arr = array();
		foreach($data['products']['data']['records'] as $value){
			$order_arr[] = array(
					'product_package_name' => $value['product_name'],
					'type' => lang('product'),
					'sold_quantity' => $value['sold_quantity']
				);
		}
		foreach($data['packages']['data']['records'] as $value){
			$order_arr[] = array(
					'product_package_name' => $value['package_name'],
					'type' => lang('package'),
					'sold_quantity' => $value['sold_quantity']
				);
		}

		// echo"<pre>";print_r($order_arr);exit;
		$filename = "products-orders--".date('d-F-Y-h-i-A').".csv";
        $fp = fopen('php://output', 'w');
        // header('Content-type: application/csv');
        header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        fputcsv($fp, array(lang('product_package_name'),lang('type'),lang('sold_quantity')));
        foreach ($order_arr as $row) {
            fputcsv($fp, $row);
        }
	}
	
}

/* End of file Employees.php */
/* Location: ./application/controllers/admin/Employees.php */
