<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends API_Controller {

    function __construct() {
        parent::__construct();
    }

    public function filter_post(){
        // order: payment_status, order_id , order_amount , address_mode
        // user : company: first name, last name

        $company = $this->input->post('company');
        $this->db->select('o.order_id , o.order_amount , o.order_guid , o.credit_card_amount , o.address_mode , o.order_status , o.payment_status , u.first_name , u.last_name , c.first_name as client_first_name, c.last_name as client_last_name ');
        $this->db->from('tbl_orders o');
        $this->db->where('u.user_type_id', 3);
        
        if (isset($company) && !empty($company) && !is_null($company)) {
            $this->db->where('u.client_id', $company);
        }
        $this->db->join('tbl_users u', 'u.user_id = o.user_id', 'inner');
        $this->db->join('tbl_users c', 'c.user_id = u.client_id', 'inner');
        
        $orderList = $this->db->get()->result();
  
        $orderRow = "";
  
        $i = 0;

       
        foreach ($orderList as $value) {
        $i++;

        $amount = $value->credit_card_amount > 0 ? getPaymentStatus($value->payment_status) : 'N/A';

        $orderRow .= '<tr>
                                <td>'.addZero($i).' </td>
                                <td>'.$value->first_name.' '.$value->last_name.'</td>
                                <td>'.$value->client_first_name.' '.$value->client_last_name.'</td>
                                <td>'.CURRENCY_SYMBOL.$value->order_amount.'</td>
                                <td>'.getDeliveryMethod($value->address_mode).'</td>
                                <td>'.getOrderStatus($value->order_status).'</td>
                                <td>'.$amount.'</td>
                                <td>'.convertDateTime($value->created_date).' </td>
                                <td>
                                <button class="btn bg-cyan btn-icon" onclick="window.location.href=\'details/'.$value->order_guid.'\'" title="'.lang('view_order_details').'"><i class="zmdi zmdi-eye"></i></button>
                                </td>
                        </tr>';
              
          }


  
          $response = [
              'success' => true,
              'orders' => $orderRow,
              'status' => 200,
              'message' => 'success',
              'data' => []
          ];
          
      $this->Return['data'] = $response;
          
      }

}
