<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {


 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
               // $this->load->database();
				$this->load->model('tasks_model');
        }
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
		$result['data'] = $this->tasks_model->get_tasks();
		$this->load->view('task_list',$result);
	}
		public function addtask()
	{
		
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('task_title','Task Title', 'required');
        $this->form_validation->set_rules('task_description','Task Description', 'required');
        $this->form_validation->set_rules('task_due_date','Due Date','required');
		 $resp = array();
        if ($this->form_validation->run() == FALSE) {
			 
			 
              $resp['msg']     =  $this->form_validation->error_array();//validation_errors();
			  $resp['status']  =  false;
			  echo json_encode($resp);
       } 
       else {
		   
		  if( $this->tasks_model->add_task() )
		     $resp['msg']     =  "Task created successfully";
		     $resp['status']  =   true;
		     echo json_encode($resp);
	   }
			  
		// Then pass $data  to Modal to insert bla bla!!
        }
		
	public function edittask()
	{
		
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('task_title','Task Title', 'required');
        $this->form_validation->set_rules('task_description','Task Description', 'required');
        $this->form_validation->set_rules('task_due_date','Due Date','required');
		 $resp = array();
        if ($this->form_validation->run() == FALSE) {
			 
			 
              $resp['msg']     =  $this->form_validation->error_array();//validation_errors();
			  $resp['status']  =  false;
			  echo json_encode($resp);
       } 
       else {
		   
		  if( $this->tasks_model->update_task() )
		   $resp['msg']     =  "Task updated successfully";
		   $resp['status']  =  true;
		   echo json_encode($resp);
	   }
			  
		// Then pass $data  to Modal to insert bla bla!!
        }	
		
	function gettask($id)
	{ 
	   $resp = array();
	   $result = $this->tasks_model->get_single_tasks($id);	
	   $result->due_date = date('m/d/Y',strtotime($result->due_date));
	   if(count($result) > 0)
	   {
		$resp['status'] = true;   
		$resp['rec']    = $result;
		}
		else
		{
		  $resp['status'] = false; 
		   $resp['msg'] = "Something went wrong try again"; 	
		}
		echo json_encode($resp);
	}
	
	function del_task($id)
	{
	   $resp = array();
	 
	   if($id > 0)
	   {
		  $result = $this->tasks_model->delete_task($id);	
		  $resp['status'] = true;   
		  $resp['msg']    = "Task deleted successfully";
		}
		else
		{
		  $resp['status'] = false; 
		   $resp['msg'] = "Something went wrong try again"; 	
		}
		echo json_encode($resp);	
	}	
		
 
	}
	?>

