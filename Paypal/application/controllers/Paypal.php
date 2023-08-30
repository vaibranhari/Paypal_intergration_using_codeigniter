<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{

public function index(){

    $this->load->view('Paypal/Items');
}

public function buy(){

    if($this->input->post()){
    // Set variables for paypal form
    $returnURL = base_url().'Paypal/success'; //payment success url
    $cancelURL = base_url().'Paypal/cancel'; //payment cancel url
    $notifyURL = base_url().'Paypal/ipn'; //ipn url
    
    // Get current user ID from the session
    //$userID = $_SESSION['userID'];

    
        $insert_data = array(
            'name' => $this->input->post('name'),
            'in' => $this->input->post('it'),
            'amount' => $this->input->post('amt'),
            // 'cur' => $this->input->post('cur'),
            );
    

    $userID=1;
    // Add fields to paypal form
    $this->paypal_lib->add_field('return', $returnURL);
    $this->paypal_lib->add_field('cancel_return', $cancelURL);
    $this->paypal_lib->add_field('notify_url', $notifyURL);
    $this->paypal_lib->add_field('item_name', $insert_data['name']);
    $this->paypal_lib->add_field('custom', $userID);
    $this->paypal_lib->add_field('quantity',  $insert_data['in']);
    $this->paypal_lib->add_field('amount',  $insert_data['amount']);
    // $this->paypal_lib->add_field('currency_code',  $insert_data['cur']);    

    // Render paypal form
    $this->paypal_lib->paypal_auto_form();
        }
}


function success(){
    
    // Get the transaction data
    $paypalInfo = $this->input->post();

    $data['item_name']= $paypalInfo['item_name'];
    $data['txn_id'] = $paypalInfo["txn_id"];
    $data['payment_amt'] = $paypalInfo["payment_gross"];
    $data['currency_code'] = $paypalInfo["mc_currency"];
    $data['status'] = $paypalInfo["payment_status"];
    // Pass the transaction data to view


    echo"<pre>";
    print_r($paypalInfo);
    echo"<pre>";
    exit();
//you can store the details that shown from this pre data in the database

}
 
function cancel(){
echo"Your payment is failed";
 }

 
 
function ipn(){
    // Paypal posts the transaction data
    $paypalInfo = $this->input->post();
    
    if(!empty($paypalInfo)){
        // Validate and get the ipn response
        $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
        // Check whether the transaction is valid
        if($ipnCheck){
            // Insert the transaction data in the database
            $data['txn_id']	= $paypalInfo["txn_id"];
            $data['payment_gross']	= $paypalInfo["mc_gross"];
            $data['currency_code']	= $paypalInfo["mc_currency"];
            $data['payer_email']	= $paypalInfo["payer_email"];
            $data['payment_status'] = $paypalInfo["payment_status"];
        }
    }
}

public function table()
{
$data['payment'] = $this->db->get('payment')->result_array();
$this->load->view('Paypal/paymentTable', $data);
}	

}