<?php
class Student_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_students($number = -1)
		{
	        if ($number == -1)//default select * from class
	        {
	                $query = $this->db->get('class');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('class', array('number' => $number));
	        return $query->row_array();
		}
}
?>