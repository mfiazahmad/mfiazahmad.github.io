<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

 <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css">
   <style>
   .alert-danger { display:none}
   .alert-success{ display:none}
   </style>
  <script src="<?php echo base_url();?>assets/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-datepicker.js"></script>
    <script>
	var base_url = '<?php echo base_url(); ?>';
 
    </script>
      <script src="<?php echo base_url();?>assets/task.js"></script>

<div class="container">
	<div class="row">
		
         
        <div class="col-md-12">
        <h4><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Task</button></h4> 
        
      
        <div class="table-responsive">
<?php

?>
                
       <table id="mytable" class="table table-bordred table-striped">
                   
       <thead>
                   <th>Title</th>
                   <th>Description</th>
                    <th>Due Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
     </thead>
     <tbody>
    <?php if(count($data)>0) { foreach($data as $task) { ?>
    <tr>
  
    <td><?php echo $task->task_title; ?></td>
    <td><?php echo $task->task_description; ?></td>
    <td><?php echo $task->due_date; ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" onClick="getTask(<?php echo $task->id; ?>)" data-target="#updatemyModal" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" onClick="put_id(<?php echo $task->id; ?>)" data-title="Delete" data-toggle="modal" data-target="#myModalDel" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    <?php } } else { ?>
     <tr>
  
    <td></td>
    <td></td>
    <td colspan="2">No Record Found</td>
    <td></td>
    <td></td>
    </tr>
    
    <?php } ?>
    
    </tbody>
        
   </table>


                
            </div>
            
        </div>
	</div>
</div>

<!--  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  Add task model >>>>>>>>>>>>>>>>>>>>>>>-->
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Task Detail</h4>
        
        <div class="alert alert-danger">
 
</div>

<div class="alert alert-success">
  
</div>

      </div>
      
      <form name="add_task" id="add_task" action="" method="post">
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " name="task_title" id="task_title" type="text" placeholder="Title">
        </div>
      
        <div class="form-group">
        <textarea rows="2"  name="task_description" id="task_description" class="form-control" placeholder="Task Description"></textarea>
    
        
        </div>
        
       <div class="input-group date" data-provide="datepicker">
    <input type="text" name="task_due_date" id="task_due_date" class="form-control" placeholder="Task Due Date">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
        
      </div>
          <div class="modal-footer ">
        <button type="button" id="addtask" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
      </div>
      </form>
      
      
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
<!--  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  Update task model >>>>>>>>>>>>>>>>>>>>>>>-->
    
    <div id="updatemyModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Task Detail</h4>
        
        <div class="alert alert-danger">
 
</div>

<div class="alert alert-success">
 
</div>

      </div>
      
      <form name="edit_task" id="edit_task" action="" method="post">
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " name="task_title" id="edit_task_title" type="text" placeholder="Title">
        </div>
      
        <div class="form-group">
        <textarea rows="2"  name="task_description" id="edit_task_description" class="form-control" placeholder="Task Description"></textarea>
    
        <input type="hidden" name="id" id="task_id">
        </div>
        
       <div class="input-group date" data-provide="datepicker">
    <input type="text" name="task_due_date" id="edit_task_due_date" class="form-control" placeholder="Task Due Date">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
        
      </div>
          <div class="modal-footer ">
        <button type="button" id="savetask" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
      </div>
      </form>
      
      
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    <!--  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  Delete task model >>>>>>>>>>>>>>>>>>>>>>>-->
   
    
   <!-- Modal -->
  <div class="modal fade" id="myModalDel" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <input type="hidden" name="del_task" id="del_task">
          <h4 class="modal-title">Delete Task</h4>
        </div>
         <div class="alert alert-danger">
 
</div>

<div class="alert alert-success">
 
</div>
        <div class="modal-body">
          <p>Are You sure you want to delete Task?.</p>
        </div>
        <div class="modal-footer">
        <button type="button" id="delte_task" onClick="delete_task()" class="btn btn-info" >Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  




</body>
</html>