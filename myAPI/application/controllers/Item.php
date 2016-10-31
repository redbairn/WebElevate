<!-- ************************************************************************************* 
*   Author: Craig Bell
*   Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
*   Student ID: D15126839 
*   Date: 2016/07/31
*   Ref: Lecture notes
*   Comments: n/a
************************************************************************************-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->data['items'] = $this->Item_model->get_Items(); // calling Item model method get_all_items()
        $this->load->view('food_item', $this->data); // load the view file , we are passing $data array to view file

	}
    public function get_Selected_item($item_ID)
    {
        $this->data['items'] = $this->Item_model->get_item_by_ID($item_ID);
        $this->load->view('header', $this->data);
        $this->load->view('content', $this->data);
        $this->load->view('footer', $this->data);
    
    }
    function __Construct(){
        parent::__Construct ();
        $this->load->database(); // load database
        $this->load->model('Item_model'); // load model 
    }
}
