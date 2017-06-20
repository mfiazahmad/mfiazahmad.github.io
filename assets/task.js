 function getTask(id)
	{
	     $.post(base_url+'task/gettask/'+id,function(resp)
		{ 
			if (resp['status'] == true)
			{
				$("#edit_task_title").val(resp['rec']['task_title']);
				$("#edit_task_description").val(resp['rec']['task_description']);
				$("#edit_task_due_date").val(resp['rec']['due_date']);
				$("#task_id").val(resp['rec']['id']);
			}
			else
			{
			    var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$(".alert-danger").html(htm);
		        $(".alert-danger").show();	
			}
		},'json');	
		 	
	}	
	function put_id(id)
	{
	   $("#del_task").val(id);	
	}
	function delete_task()
	{
	     var id = $("#del_task").val();
		 $.post(base_url+'task/del_task/'+id,function(resp)
		{ 
			if (resp['status'] == true)
			{
				  $(".alert-danger").hide();	
				 $(".alert-success").html('Task Deleted successfully');
				 $(".alert-success").show();
				   setTimeout(function()
				{ 
				  $('.close').click();
				 },4000); 
				 
				 $("#del_task").val('');
				 location.reload();
				 // $(".alert-success").hide();
			}
			else
			{
				$(".alert-success").hide();
			    var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$(".alert-danger").html(htm);
		        $(".alert-danger").show();	
			}
		},'json');	
			
	}
	
    $(document).ready(function(){
		
		$('.datepicker').datepicker();
		

		
		$('#addtask').click(function(event){
		 event.preventDefault();
		
		  $.post(base_url+'task/addtask',$('#add_task').serialize(),function(resp)
		  { 

			if (resp['status'] == true)
			{
				  $(".alert-danger").hide();	
				 $(".alert-success").html('Task created successfully');
				 $(".alert-success").show();
				   setTimeout(function()
				{ 
				  $('.close').click();
				 },4000); 
				 
				 $('#add_task')[0].reset();
				 location.reload();
				 // $(".alert-success").hide();
			}
			else
			{
				$(".alert-success").hide();
			    var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$(".alert-danger").html(htm);
		        $(".alert-danger").show();	
			}
		},'json');	
		
	});
	
	
	$('#savetask').click(function(event){
		event.preventDefault();

		  $.post(base_url+'task/edittask',$('#edit_task').serialize(),function(resp)
		  { 

			if (resp['status'] == true)
			{
				    $(".alert-danger").hide();	
				 $(".alert-success").html('Task updated successfully');
				 $(".alert-success").show();
				   setTimeout(function()
				{ 
				  $('.close').click();
				 },4000); 
				 
				 $('#edit_task')[0].reset();
				 location.reload();
				 // $(".alert-success").hide();
			}
			else
			{
				$(".alert-success").hide();
			
			    var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$(".alert-danger").html(htm);
		        $(".alert-danger").show();	
			}
		},'json');	
		
	});
	
	
	
	
		});