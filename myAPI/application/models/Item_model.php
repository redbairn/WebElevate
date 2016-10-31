<!-- ************************************************************************************* 
*   Author: Craig Bell
*   Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
*   Student ID: D15126839 
*   Date: 2016/07/31
*   Ref: Lecture notes
*   Comments: The Item model which is used with the Item controller.
************************************************************************************-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    /*Function to get all the data from all the columns in foodItems table*/
    function get_Items()
    {
        $this->db->select('food_ID, item_ID, item_HEADER, item_DESCRIPTION, item_FOOTER'); 
        $this->db->from('fooditems');
        $query = $this->db->get();
        return $query->result();
    }
    /*Function to get the data from one record by using the item_ID*/
     function get_item_by_ID($item_ID)
    {
        $this->db->select('food_ID, item_ID, item_HEADER, item_DESCRIPTION, item_FOOTER'); 
        $this->db->from('fooditems');
        $this->db->where('item_ID', $item_ID);
        $query = $this->db->get();
        return $query->result();
    }
    


}