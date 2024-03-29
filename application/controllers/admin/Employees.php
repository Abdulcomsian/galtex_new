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
	// public function export_client_employees(){
	// 	/* Get Client Employees */
	// 	$client_id = $_REQUEST['client_id'];
	// 	$query = $this->db->query('SELECT * FROM tbl_users WHERE client_id = "'.$client_id.'" AND user_id != "'.$client_id.'"');
	// 	$employees = $query->result();

	// 	$filename = "client_employees_" . date('d-F-Y-h-i-A') . ".csv";
	// 	$fp = fopen('php://output', 'w');
	// 	fwrite($fp, "\xEF\xBB\xBF");
	// 	$header = array('מספר משתמש', 'שם פרטי', 'שם משפחה', 'מספר טלפון', 'דוא"ל');
	// 	fputcsv($fp, $header);
	// 	foreach ($employees as $employee) {
	// 		$row = array(
	// 			$employee->user_id,
	// 			$employee->first_name,
	// 			$employee->last_name,
	// 			$employee->phone_number,
	// 			$employee->email,
	// 		);
	// 		fputcsv($fp, $row);
	// 	}

	// 	fclose($fp);

	// 	header('Content-Encoding: UTF-8');
	// 	header('Content-type: text/csv; charset=UTF-8');
	// 	header('Content-Disposition: attachment; filename="' . $filename . '"');
	// 	exit;

	// }

	public function export_client_employees()
	{		
		$query = $this->db->query("
			SELECT *
			FROM tbl_orders AS a
			JOIN tbl_order_details AS b ON a.order_id = b.order_id
			JOIN tbl_users AS c ON a.user_id = c.user_id
			WHERE a.payment_status='Success' AND a.order_status='Created' AND c.client_id = '".$this->input->get('client_id')."' AND c.user_id != '".$this->input->get('client_id')."'
		");

		$employeeNotOrdered = $this->db->query("
			SELECT * FROM `tbl_users` left join tbl_orders on tbl_users.user_id = tbl_orders.user_id WHERE tbl_users.client_id='".$this->input->get('client_id')."' AND tbl_orders.order_id IS NULL GROUP BY tbl_users.user_id
		");

		if($query->num_rows() == 0){
			$this->session->set_flashdata('error',lang('order_details_not_found'));
			redirect('admin/clients/list');
		}
		
		$data = $query->result();
		$employeeNotOrderedArray = $employeeNotOrdered->result();
// echo "<pre>"; print_r($data); exit;
		$order_arr = array();
		foreach($data as $value){
			// $picked_products = array_column($value['order_product_details'],'product_package_name');
			$order_arr[] = array(
					'first_name' => $value->first_name,
					'last_name' => $value->last_name,
					'employee_email' => $value->email,
					'employee_phone_number' => $value->phone_number,
					'picked_products' => $value->product_package_name, 
					'address' => ($value->address_mode == 'Pickup') ? $value->pickup_address : ($value->apartment.$value->street_house.",".$value->city." ".$value->postal_code), 
					'order_amount' => $value->order_amount, 
					'created_date' => convertDateTime($value->created_date),
					'quantity' => $value->quantity,
					'order/didn`t order' => "1",
				);
		}

		foreach($employeeNotOrderedArray as $value){
			$order_arr[] = array(
				'first_name' => $value->first_name,
				'last_name' => $value->last_name,
				'employee_email' => $value->email,
				'employee_phone_number' => $value->phone_number,
				'picked_products' => $value->product_package_name, 
				'address' => ($value->address_mode == 'Pickup') ? $value->pickup_address : ($value->apartment.$value->street_house.",".$value->city." ".$value->postal_code), 
				'order_amount' => $value->order_amount, 
				'created_date' => convertDateTime($value->created_date),
				'quantity' => $value->quantity,
				'order/didn`t order' => "0",
			);
		}
		
		// echo"<pre>";print_r($order_arr);exit;
		$filename = "employees-orders--".date('d-F-Y-h-i-A').".csv";
        $fp = fopen('php://output', 'w');
		fwrite($fp, "\xEF\xBB\xBF");       
        header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        fputcsv($fp, array(lang('first_name'),lang('last_name'),lang('employee_email'),lang('employee_phone_number'),lang('picked_products'), lang('order_address'),lang('amount'),lang('created_date'), lang('quantity'), lang('order/didn`t order')));
        foreach ($order_arr as $row) {
            fputcsv($fp, $row);
        }
	}

	public function export_client_orders(){
		/* Get Products Orders */
		$client_id = $this->input->get('client_id');

		// /* Get Shop Products */
		// $data['products'] = $this->Shop_model->get_shop_products('product_name,sold_quantity',array('client_id' => $client_id, 'client_status' => 'Liked'),TRUE);
		// /* Get Packages */
		// $data['packages'] = $this->Shop_model->get_packages('package_name,sold_quantity',array('client_id' => $client_id, 'client_status' => 'Liked'),TRUE);
		// if(empty($data['products']['data']['records']) && empty($data['packages']['data']['records'])){
		// 	$this->session->set_flashdata('error',lang('order_details_not_found'));
		// 	redirect('admin/clients/list');
		// }
// print_r($client_id); exit;

// print_r("123");exit;
// SELECT * FROM tbl_client_shop_products
			// WHERE client_status = 'LIKED' AND client_id = '".$client_id."' GROUP BY product_id

		$query = $this->db->query("
			SELECT *
			FROM tbl_orders AS a
			JOIN tbl_order_details AS b ON a.order_id = b.order_id
			JOIN tbl_users AS c ON a.user_id = c.user_id
			WHERE a.payment_status='Success' AND a.order_status='Created' AND c.client_id = '".$this->input->get('client_id')."' AND c.user_id != '".$this->input->get('client_id')."'
		");

		if($query->num_rows() == 0){
			$this->session->set_flashdata('error',lang('order_details_not_found'));
			redirect('admin/clients/list');
		}		
		$products = $query->result();
		$totals = array();

		foreach ($products as $pro) {
			$product_package_id = $pro->product_package_id;
			$product_package_name = $pro->product_package_name;
			$quantity = $pro->quantity;

			if (!isset($totals[$product_package_id])) {
				$totals[$product_package_id] = array(
					'product_package_name' => $product_package_name,
					'quantity' => 0
				);
			}

			$totals[$product_package_id]['quantity'] += $quantity;
		}
		$order_arr = array();
		foreach($totals as $value){
			$order_arr[] = array(
					'product_package_name' => $value['product_package_name'],
					'type' => lang('product'),
					'quantity' => $value['quantity']
				);
		}
		// foreach($data['packages']['data']['records'] as $value){
		// 	$order_arr[] = array(
		// 			'product_package_name' => $value['package_name'],
		// 			'type' => lang('package'),
		// 			'sold_quantity' => $value['sold_quantity']
		// 		);
		// }

		// foreach($data['products']['data']['records'] as $value){
		// 	$order_arr[] = array(
		// 			'product_package_name' => $value['product_name'],
		// 			'type' => lang('package'),
		// 			'sold_quantity' => $value['sold_quantity']
		// 		);
		// }
		//echo"<pre>";print_r($order_arr);exit;
		$filename = "products-orders--".date('d-F-Y-h-i-A').".csv";
        $fp = fopen('php://output', 'w');
		fwrite($fp, "\xEF\xBB\xBF");
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
