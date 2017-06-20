<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks_model extends CI_Model {


         public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        public function get_tasks()
        {
                $query = $this->db->get('tasks');
                return $query->result();
        }
		public function get_single_tasks($id)
		{  
		    $condition = array('id' => $id);
            $this->db->select('*')->from('tasks')->where($condition);
            $query  =  $this->db->get();
			return $query->row();
			
		}

        public function add_task()
        {
			   $insert['task_title'] = $this->input->post('task_title');
			   $insert['task_description'] = $this->input->post('task_description');
			   $insert['due_date'] = date('Y-m-d',strtotime($this->input->post('task_due_date')));
               $this->db->insert('tasks', $insert);
        }

        public function update_task()
        {
               $update['task_title'] = $this->input->post('task_title');
			   $update['task_description'] = $this->input->post('task_description');
			   $update['due_date'] = date('Y-m-d',strtotime($this->input->post('task_due_date')));
               $this->db->update('tasks', $update, array('id' => $this->input->post('id')));
        }
		 public function delete_task($id)
        {
               $this->db->where('id', $id);
               $this->db->delete('tasks'); 
        }

}
?>